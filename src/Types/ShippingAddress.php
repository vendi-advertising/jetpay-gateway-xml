<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

final class ShippingAddress extends AbstractAddress
{
    private $_shipping_id; //  Specify billing id. Required for 'update-customer' if multiple billing-ids exist, optional for 'add-billing'.

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
