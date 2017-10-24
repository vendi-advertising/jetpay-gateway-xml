<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/**
 * @serializeTag billing
 */
final class BillingAddress extends AbstractAddress
{
    private $_billing_id; //  Specify billing id. Required for 'update-customer' if multiple billing-ids exist, optional for 'add-billing'.
    private $_account_type; // The customer's ACH account type. Values: 'checking' or 'savings'
    private $_entity_type;  // The customer's ACH account entity. Values: 'personal' or 'business'

    /**
     * @serializeTag billing_id
     * @return string
     */
    final public function get_billing_id() : ?string
    {
        return $this->_billing_id;
    }

    final public function set_billing_id(string $value)
    {
        $this->_billing_id = $value;
    }

    /**
     * @serializeTag account_type
     * @return string
     */
    final public function get_account_type() : ?string
    {
        return $this->_account_type;
    }

    final public function set_account_type(string $value)
    {
        $this->_account_type = $value;
    }

    /**
     * @serializeTag entity_type
     * @return string
     */
    final public function get_entity_type() : ?string
    {
        return $this->_entity_type;
    }

    final public function set_entity_type(string $value)
    {
        $this->_entity_type = $value;
    }
}
