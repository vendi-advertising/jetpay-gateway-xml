<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/**
 * @serializeTag product
 */
final class Product extends AbstractSerializableType
{
    /*
        *     Always required
        **    Required for offline transactions
        ***   Required for Level 2 and Level 3 transactions
        ****  Required for Level 3 transactions
        †     Required for 3D-Secure transactions
        ‡     Required for Override transactions
        ††    Required for Partial Payment Transactions
        §     Required for ACH transactions
        ¶     Required for Line Item Reporting
     */
    private $_product_code;         //****¶ Merchant defined description code of the item being purchased.
    private $_description;          //****  Description of the item(s) being supplied.
    private $_commodity_code;       //****  International description code of the individual good or service being supplied. The acquirer or processor will provide a list of current codes.
    private $_unit_of_measure;      //****  Code for units of measurement as used in international trade. Default: 'EACH'
    private $_unit_cost;            //****  Unit cost of item purchased. May contain up to 4 decimal places.
    private $_quantity;             //****  Quantity of the item(s) being purchased. Default: '1'
    private $_total_amount;         //****  Purchase amount associated with the item. Default to 'unit_cost' x 'quantity' rounded to the nearest penny.
    private $_tax_amount;           //****  Amount of tax on specific item. Amount should not be included in item_total_amount. Default: '0.00'
    private $_tax_rate;             //****  Percentage representing the value_added tax applied. 1% = 1.00. Default: '0.00'
    private $_discount_amount;      //      Discount amount which can have been applied by the merchant on the sale of the specific item. Amount should not be included in 'item_total_amount'.
    private $_discount_rate;        //      Discount rate for the line item. 1% = 1.00. Default: '0.00'
    private $_tax_type;             //      Type of value_added taxes that are being used.
    private $_alternate_tax_id;     //      Tax identification number of the merchant that reported the alternate tax amount.

    /**
     * @serializeTag product-code
     * @return string
     */
    final public function get_product_code() : ?string
    {
        return $this->_product_code;
    }

    final public function set_product_code(string $value)
    {
        $this->_product_code = $value;
    }

    /**
     * @serializeTag description
     * @return string
     */
    final public function get_description() : ?string
    {
        return $this->_description;
    }

    final public function set_description(string $value)
    {
        $this->_description = $value;
    }

    /**
     * @serializeTag commodity-code
     * @return string
     */
    final public function get_commodity_code() : ?string
    {
        return $this->_commodity_code;
    }

    final public function set_commodity_code(string $value)
    {
        $this->_commodity_code = $value;
    }

    /**
     * @serializeTag unit-of-measure
     * @return string
     */
    final public function get_unit_of_measure() : ?string
    {
        return $this->_unit_of_measure;
    }

    final public function set_unit_of_measure(string $value)
    {
        $this->_unit_of_measure = $value;
    }

    /**
     * @serializeTag unit-cost
     * @return string
     */
    final public function get_unit_cost() : ?string
    {
        return $this->_unit_cost;
    }

    final public function set_unit_cost(string $value)
    {
        $this->_unit_cost = $value;
    }

    /**
     * @serializeTag quantity
     * @return string
     */
    final public function get_quantity() : ?string
    {
        return $this->_quantity;
    }

    final public function set_quantity(string $value)
    {
        $this->_quantity = $value;
    }

    /**
     * @serializeTag total-amount
     * @return string
     */
    final public function get_total_amount() : ?string
    {
        return $this->_total_amount;
    }

    final public function set_total_amount(string $value)
    {
        $this->_total_amount = $value;
    }

    /**
     * @serializeTag tax-amount
     * @return string
     */
    final public function get_tax_amount() : ?string
    {
        return $this->_tax_amount;
    }

    final public function set_tax_amount(string $value)
    {
        $this->_tax_amount = $value;
    }

    /**
     * @serializeTag tax-rate
     * @return string
     */
    final public function get_tax_rate() : ?string
    {
        return $this->_tax_rate;
    }

    final public function set_tax_rate(string $value)
    {
        $this->_tax_rate = $value;
    }

    /**
     * @serializeTag discount-amount
     * @return string
     */
    final public function get_discount_amount() : ?string
    {
        return $this->_discount_amount;
    }

    final public function set_discount_amount(string $value)
    {
        $this->_discount_amount = $value;
    }

    /**
     * @serializeTag discount-rate
     * @return string
     */
    final public function get_discount_rate() : ?string
    {
        return $this->_discount_rate;
    }

    final public function set_discount_rate(string $value)
    {
        $this->_discount_rate = $value;
    }

    /**
     * @serializeTag tax-type
     * @return string
     */
    final public function get_tax_type() : ?string
    {
        return $this->_tax_type;
    }

    final public function set_tax_type(string $value)
    {
        $this->_tax_type = $value;
    }

    /**
     * @serializeTag alternate-tax-id
     * @return string
     */
    final public function get_alternate_tax_id() : ?string
    {
        return $this->_alternate_tax_id;
    }

    final public function set_alternate_tax_id(string $value)
    {
        $this->_alternate_tax_id = $value;
    }
}
