<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\BillingAddress;

/**
 * @coversNothing
 */
class test_AbstractSerializableType extends jetpay_test_base
{
    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\start::__toXml
     */
    public function test___toXml()
    {
        $obj = new BillingAddress();
        $obj->set_first_name('Chris');
        dump($obj->__toXml());
    }
}
