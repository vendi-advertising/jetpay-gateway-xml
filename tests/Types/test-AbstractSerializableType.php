<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType;
use Vendi\PaymentGateways\JetPay\Xml\Tests\Mocks\mock_for_AbstractSerializableType;

/**
 * @group AbstractSerializableType
 */
class test_AbstractSerializableType extends jetpay_test_base
{
    use XpathAssertions;

    private function _get_mock()
    {
        return new mock_for_AbstractSerializableType();
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__null()
    {
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple(false) );
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple(null) );
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple('') );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__empty_lines()
    {
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\n") );
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\r\n") );
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\r") );
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple(" ") );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__no_at_sign()
    {
        $test = '
        /**
         * I am cool!
         */
        ';
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple($test) );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__no_tag()
    {
        $test = '
        /**
         * @return_string
         */
        ';
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple($test) );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__wrong_tag()
    {
        $test = '
        /**
         * @return string
         */
        ';
        $this->assertNull( AbstractSerializableType::_get_serializeTag_name_and_value_tuple($test) );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple__valid()
    {
        $test = '
        /**
         * @serializeTag cheese
         */
        ';
        $this->assertSame( [ 'name'=>'serializeTag', 'value'=>'cheese' ], AbstractSerializableType::_get_serializeTag_name_and_value_tuple($test) );
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_xml_structure_for_object
     */
    public function test__get_xml_structure_for_object()
    {
        $obj = $this->_get_mock();
        $result = AbstractSerializableType::_get_xml_structure_for_object($obj);
        $result = preg_replace( '/[\n\r]/', '', trim(str_replace( '<?xml version="1.0" encoding="UTF-8"?>', '', $result) ));
        $result = preg_replace( '/\>\s+\</', '><', $result);
        $this->assertSame( '<mock><cheese>American</cheese></mock>', $result);
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_xml_structure_for_object
     */
    public function test__get_xml_structure_for_object__no_root()
    {
        $obj = new class() extends AbstractSerializableType{};
        $this->setExpectedException( '\Exception' );
        $result = AbstractSerializableType::_get_xml_structure_for_object($obj);
    }
}
