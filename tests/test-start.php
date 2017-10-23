<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests;

use Vendi\PaymentGateways\JetPay\Xml\start;

/**
 * @coversNothing
 */
class test_start extends jetpay_test_base
{
    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\start::__construct
     * @return [type] [description]
     */
    public function test_pretty_much_nothing()
    {
        $this->assertInstanceOf('\Vendi\PaymentGateways\JetPay\Xml\start', new start());
    }
}
