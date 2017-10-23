<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress;

/**
 * @coversNothing
 */
class test_AbstractAddress extends jetpay_test_base
{
     use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_first_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_first_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_last_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_last_name
     * @dataProvider provider_for_test__xml_stuff
     */
    public function test__xml_stuff( $property_name, $xml_tag_name )
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new BillingAddress();
        $obj->$setter( 'CHEESE' );

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals( "<$xml_tag_name>CHEESE</$xml_tag_name>", "//billing/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'first_name', 'first-name' ],
                    [ 'last_name', 'last-name' ],
        ];
    }
}
