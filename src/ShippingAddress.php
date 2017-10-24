<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/**
 * @serializeTag shipping
 */
final class ShippingAddress extends AbstractAddress
{
    private $_shipping_id; //  Specify shipping id. Required for 'update-customer' if multiple shipping-ids exist, optional for 'add-shipping'.

    /**
     * @serializeTag shipping_id
     * @return string
     */
    final public function get_shipping_id() : string
    {
        return $this->_shipping_id;
    }

    final public function set_shipping_id(string $value)
    {
        $this->_shipping_id = $value;
    }
}
