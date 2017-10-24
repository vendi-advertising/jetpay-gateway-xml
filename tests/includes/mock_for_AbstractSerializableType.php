<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Mocks;

use Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType;

/**
 * @serializeTag mock
 */
class mock_for_AbstractSerializableType extends AbstractSerializableType
{
    /**
     * @serializeTag cheese
     */
    public function get_cheese()
    {
        return 'American';
    }

    /**
     * @return string
     */
    public function get_nothing()
    {
    }
}
