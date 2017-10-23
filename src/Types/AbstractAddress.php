<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/** @MappedSuperclass */
abstract class AbstractAddress extends AbstractSerializableType
{
    private $_first_name;   // Cardholder's first name.
    private $_last_name;    // Cardholder's last name.
    private $_address1;     // Cardholder's billing address.
    private $_city;         // Card billing city.
    private $_state;        // Card billing state/province. Format: CC
    private $_postal;       // Card billing postal code.
    private $_country;      // Card billing country code. Format: CC/ISO 3166
    private $_phone;        // Billing phone number.
    private $_email;        // Billing email address.
    private $_company;      // Cardholder's company.
    private $_address2;     // Card billing address, line 2.
    private $_fax;          // Billing fax number.
    private $_priority;     // Specify priority (If omitted, will be auto-generated and returned in response). Format: Numeric, 1-255

    /**
     * @serializeTag first-name
     * @return string
     */
    final public function get_first_name() : ?string
    {
        return $this->_first_name;
    }

    final public function set_first_name(string $value)
    {
        $this->_first_name = $value;
    }

    /**
     * @serializeTag last-name
     * @return string
     */
    final public function get_last_name() : ?string
    {
        return $this->_last_name;
    }

    final public function set_last_name(string $value)
    {
        $this->_last_name = $value;
    }

    /**
     * @serializeTag address1
     * @return string
     */
    final public function get_address1() : ?string
    {
        return $this->_address1;
    }

    final public function set_address1(string $value)
    {
        $this->_address1 = $value;
    }

    /**
     * @serializeTag city
     * @return string
     */
    final public function get_city() : ?string
    {
        return $this->_city;
    }

    final public function set_city(string $value)
    {
        $this->_city = $value;
    }

    /**
     * @serializeTag state
     * @return string
     */
    final public function get_state() : ?string
    {
        return $this->_state;
    }

    final public function set_state(string $value)
    {
        $this->_state = $value;
    }

    /**
     * @serializeTag postal
     * @return string
     */
    final public function get_postal() : ?string
    {
        return $this->_postal;
    }

    final public function set_postal(string $value)
    {
        $this->_postal = $value;
    }

    /**
     * @serializeTag country
     * @return string
     */
    final public function get_country() : ?string
    {
        return $this->_country;
    }

    final public function set_country(string $value)
    {
        $this->_country = $value;
    }

    /**
     * @serializeTag phone
     * @return string
     */
    final public function get_phone() : ?string
    {
        return $this->_phone;
    }

    final public function set_phone(string $value)
    {
        $this->_phone = $value;
    }

    /**
     * @serializeTag email
     * @return string
     */
    final public function get_email() : ?string
    {
        return $this->_email;
    }

    final public function set_email(string $value)
    {
        $this->_email = $value;
    }

    /**
     * @serializeTag company
     * @return string
     */
    final public function get_company() : ?string
    {
        return $this->_company;
    }

    final public function set_company(string $value)
    {
        $this->_company = $value;
    }

    /**
     * @serializeTag address2
     * @return string
     */
    final public function get_address2() : ?string
    {
        return $this->_address2;
    }

    final public function set_address2(string $value)
    {
        $this->_address2 = $value;
    }

    /**
     * @serializeTag fax
     * @return string
     */
    final public function get_fax() : ?string
    {
        return $this->_fax;
    }

    final public function set_fax(string $value)
    {
        $this->_fax = $value;
    }

    /**
     * @serializeTag priority
     * @return string
     */
    final public function get_priority() : ?string
    {
        return $this->_priority;
    }

    final public function set_priority(string $value)
    {
        $this->_priority = $value;
    }
}
