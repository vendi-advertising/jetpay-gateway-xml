<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress;

class test_AbstractAddress extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_first_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_first_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_last_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_last_name
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_address1
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_address1
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_city
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_city
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_state
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_state
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_country
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_country
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_phone
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_phone
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_email
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_email
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_company
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_company
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_address2
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_address2
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_fax
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_fax
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::set_priority
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractAddress::get_priority
     *
     * @dataProvider provider_for_test__xml_stuff
     * @param mixed $property_name
     * @param mixed $xml_tag_name
     */
    public function test__xml_stuff($property_name, $xml_tag_name)
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new BillingAddress();
        $obj->$setter('CHEESE');

        $this->assertSame('CHEESE', $obj->$getter());

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//billing/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'first_name', 'first-name' ],
                    [ 'last_name', 'last-name' ],
                    [ 'address1', 'address1' ],
                    [ 'city', 'city' ],
                    [ 'state', 'state' ],
                    [ 'postal', 'postal' ],
                    [ 'country', 'country' ],
                    [ 'phone', 'phone' ],
                    [ 'email', 'email' ],
                    [ 'company', 'company' ],
                    [ 'address2', 'address2' ],
                    [ 'fax', 'fax' ],
                    [ 'priority', 'priority' ],
        ];
    }
}
