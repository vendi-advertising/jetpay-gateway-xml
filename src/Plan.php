<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/**
 * @serializeTag plan
 */
final class Plan extends AbstractSerializableType
{
    private $_plan_id;            // The unique plan ID that references only this recurring plan.
    private $_payments;           // The number of payments before the recurring plan is complete. Note: Use '0' for 'until canceled'
    private $_amount;             // The plan amount to be charged each billing cycle. Format: x.xx
    private $_day_frequency;      // How often, in days, to charge the customer. Cannot be set with 'month-frequency' or 'day-of-month'.
    private $_month_frequency;    // How often, in months, to charge the customer. Cannot be set with 'day-frequency'. Must be set with 'day-of-month'. Values: 1 through 24
    private $_day_of_month;       // The day that the customer will be charged. Cannot be set with 'day-frequency'. Must be set with 'month-frequency'. Values: 1 through 31 - for months without 29, 30, or 31 days, the charge will be on the last day

    /**
     * @serializeTag plan-id
     * @return string
     */
    final public function get_plan_id() : ?string
    {
        return $this->_plan_id;
    }

    final public function set_plan_id(string $value)
    {
        $this->_plan_id = $value;
    }

    /**
     * @serializeTag payments
     * @return string
     */
    final public function get_payments() : ?string
    {
        return $this->_payments;
    }

    final public function set_payments(string $value)
    {
        $this->_payments = $value;
    }

    /**
     * @serializeTag amount
     * @return string
     */
    final public function get_amount() : ?string
    {
        return $this->_amount;
    }

    final public function set_amount(string $value)
    {
        $this->_amount = $value;
    }

    /**
     * @serializeTag day-frequency
     * @return string
     */
    final public function get_day_frequency() : ?string
    {
        return $this->_day_frequency;
    }

    final public function set_day_frequency(string $value)
    {
        $this->_day_frequency = $value;
    }

    /**
     * @serializeTag month-frequency
     * @return string
     */
    final public function get_month_frequency() : ?string
    {
        return $this->_month_frequency;
    }

    final public function set_month_frequency(string $value)
    {
        $this->_month_frequency = $value;
    }

    /**
     * @serializeTag day-of-month
     * @return string
     */
    final public function get_day_of_month() : ?string
    {
        return $this->_day_of_month;
    }

    final public function set_day_of_month(string $value)
    {
        $this->_day_of_month = $value;
    }
}
