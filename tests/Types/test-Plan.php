<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\Plan;

class test_APlan extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_plan_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_plan_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_payments
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_payments
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_day_frequency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_day_frequency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_month_frequency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_month_frequency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::set_day_of_month
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Plan::get_day_of_month
     *
     * @dataProvider provider_for_test__xml_stuff
     * @param mixed $property_name
     * @param mixed $xml_tag_name
     * @param mixed $root
     */
    public function test__xml_stuff($property_name, $xml_tag_name, $root)
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new Plan();
        $obj->$setter('CHEESE');

        $this->assertSame('CHEESE', $obj->$getter());

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//$root/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'plan_id', 'plan-id', 'plan'],
                    [ 'payments', 'payments', 'plan'],
                    [ 'amount', 'amount', 'plan'],
                    [ 'day_frequency', 'day-frequency', 'plan'],
                    [ 'month_frequency', 'month-frequency', 'plan'],
                    [ 'day_of_month', 'day-of-month', 'plan'],
        ];
    }
}
