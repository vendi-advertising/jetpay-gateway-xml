<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress;

class test_BillingAddress extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::set_billing_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::get_billing_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::set_account_type
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::get_account_type
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::set_entity_type
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress::get_entity_type
     *
     * @dataProvider provider_for_test__xml_stuff
     * @param mixed $property_name
     * @param mixed $xml_tag_name
     */
    public function test__xml_stuff($property_name, $xml_tag_name, $root)
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new BillingAddress();
        $obj->$setter('CHEESE');

        $this->assertSame( 'CHEESE', $obj->$getter() );

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//$root/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'billing_id', 'billing_id', 'billing'],
                    [ 'account_type', 'account_type', 'billing' ],
                    [ 'entity_type', 'entity_type', 'billing' ],
        ];
    }
}
