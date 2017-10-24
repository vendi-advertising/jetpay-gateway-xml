<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

abstract class AbstractSerializableType
{
    /**
     * Attempt to parse the PHP comment on a given reflected object looking for
     * the specific @serializeTag value.
     *
     * @param  string|false $comment the docBlock for the given object or false
     *                               if there isn't one
     * @return array|null   if parsing succeeds, returns a tuple with keys
     *                              name and value, otherwise null
     */
    final public static function _get_serializeTag_name_and_value_tuple($comment) : ?array
    {
        //No PHP comment
        if (!$comment) {
            return null;
        }

        //Normalize returns, trim extra whitespace
        $comment = trim(preg_replace('/[\n\r]/', "\n", $comment));

        //Basically an empty PHP comment
        if (!$comment) {
            return null;
        }

        //Grab each line and make sure we have at least one
        $lines = array_filter(explode("\n", $comment));

        foreach ($lines as $line) {
            //Trim all whitespace, asteriks and forward slashes from start and end
            //NOTE: This must be double-quoted for escape reasons.
            $line = trim($line, " \t\n\r\0\x0B*\/");

            //We only want lines that start with '@'
            if (0 !== mb_strpos($line, '@')) {
                continue;
            }

            //Look for something like:
            //@blah something
            if (!preg_match('/^\@(?P<name>[a-zA-Z]+)\s+(?P<value>[a-zA-Z0-9\-_]+)$/', $line, $matches)) {
                continue;
            }

            //Grab the parts
            $name = $matches[ 'name' ];
            $value = $matches[ 'value' ];

            //Right now we only support one tag, return a tuple.
            if ('serializeTag' === $name) {
                return [
                            'name' => $name,
                            'value' => $value,
                    ];
            }
        }

        //Could find anything, explicitly return null
        return null;
    }

    final public static function _get_xml_structure_for_object(AbstractSerializableType $obj) :?string
    {
        //Relfect upon the currant instance
        $reflectionClass = new \ReflectionClass($obj);

        //Get the root tag
        $root_tag = self::_get_serializeTag_name_and_value_tuple($reflectionClass->getDocComment());
        if (!$root_tag) {
            throw new \Exception('Could not find a serializeTag on the supplied object');
        }

        //Create our XML document
        $xmlRequest = new \DOMDocument('1.0', 'UTF-8');

        //Format pretty for testing
        $xmlRequest->formatOutput = true;

        //Create the root node using this instance's root tag
        $root = $xmlRequest->createElement($root_tag[ 'value' ]);

        //Grab public methods
        //TODO: Check the constants, there used to be a weird case where other things
        //spilled through on this.
        $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

        //NOTE: We don't specify node order at all
        foreach ($methods as $method) {

            //For the current method, see if it has a serializeTag attribute
            $child_tag = self::_get_serializeTag_name_and_value_tuple($method->getDocComment());
            if (! $child_tag) {
                //A missing tag is non-fatal, we can just skip those
                continue;
            }

            //Create a child node with the tag as specified in the docBlock
            $child_node = $xmlRequest->createElement($child_tag[ 'value' ]);

            //Invoke the method using this instance to get its value
            $child_node_value = $method->invoke($obj);

            //TODO: Right now we're creating empty (self-closing) nodes for null-like
            //values. We'll need to see if the gatewate supports this or if it wants
            //empty valued:<xyz></xyz>
            if ($child_node_value) {
                $text_node = $xmlRequest->createTextNode($child_node_value);
                $child_node->appendChild($text_node);
            }

            $root->appendChild($child_node);
        }

        //Append our root node to the main XML document
        $xmlRequest->appendChild($root);

        //Grab it as a string
        $xmlString = $xmlRequest->saveXML();

        return $xmlString;
    }

    /**
     * Return the current object described as XML.
     *
     * @throws \Exception if a serializeTag cannot be found on the current instance
     *
     * @return string
     */
    final public function __toXml()
    {
        return self::_get_xml_structure_for_object($this);
    }
}
