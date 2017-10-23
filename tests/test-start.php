<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests;

use PHPUnit\Framework\TestCase;
use Vendi\PaymentGateways\JetPay\Xml\start;

/**
 * @coversNothing
 */
class test_start extends TestCase
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
