<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\Product;

class test_Product extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_product_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_product_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_description
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_description
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_commodity_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_commodity_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_unit_of_measure
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_unit_of_measure
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_unit_cost
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_unit_cost
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_quantity
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_quantity
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_total_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_total_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_tax_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_tax_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_discount_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_discount_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_discount_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_discount_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_tax_type
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_tax_type
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::set_alternate_tax_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\Product::get_alternate_tax_id
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

        $obj = new Product();
        $obj->$setter('CHEESE');

        $this->assertSame('CHEESE', $obj->$getter());

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//$root/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'product_code', 'product-code', 'product'],
                    [ 'description', 'description', 'product'],
                    [ 'commodity_code', 'commodity-code', 'product'],
                    [ 'unit_of_measure', 'unit-of-measure', 'product'],
                    [ 'unit_cost', 'unit-cost', 'product'],
                    [ 'quantity', 'quantity', 'product'],
                    [ 'total_amount', 'total-amount', 'product'],
                    [ 'tax_amount', 'tax-amount', 'product'],
                    [ 'tax_rate', 'tax-rate', 'product'],
                    [ 'discount_amount', 'discount-amount', 'product'],
                    [ 'discount_rate', 'discount-rate', 'product'],
                    [ 'tax_type', 'tax-type', 'product'],
                    [ 'alternate_tax_id', 'alternate-tax-id', 'product'],
        ];
    }
}
