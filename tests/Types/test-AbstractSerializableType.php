<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress;

/**
 * @coversNothing
 */
class test_AbstractSerializableType extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\start::__toXml
     */
    public function test___toXml()
    {
        $obj = new BillingAddress();
        $obj->set_first_name('Chris');

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals('<first-name>Chris</first-name>', '//billing/first-name', $document);
    }
}
