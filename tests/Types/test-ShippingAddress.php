<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\ShippingAddress;

class test_ShippingAddress extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\ShippingAddress::set_shipping_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\ShippingAddress::get_shipping_id
     *
     * @dataProvider provider_for_test__xml_stuff
     * @param mixed $property_name
     * @param mixed $xml_tag_name
     */
    public function test__xml_stuff($property_name, $xml_tag_name, $root)
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new ShippingAddress();
        $obj->$setter('CHEESE');

        $this->assertSame( 'CHEESE', $obj->$getter() );

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//$root/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'shipping_id', 'shipping_id', 'shipping' ],
        ];
    }
}
