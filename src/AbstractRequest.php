<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Types;

/**
 * @serializeTag product
 */
abstract class AbstractRequest extends AbstractSerializableType
{
    private $_api_key;                      //*    api-key is obtained in the security keys section of the control panel settings.
    private $_redirect_url;                 //*   A URL on your web server that the gateway will redirect your customer to after sensitive data collection.
    private $_amount;                       //* Total amount to be charged (For "validate" actions, amount must be 0.00 or omitted).
    private $_surcharge_amount;             //    Surcharge amount. Format: x.xx
    private $_authorization_code;           //**    Specify authorization code. For use with "offline" action only.
    private $_ip_address;                   //  Cardholder's IP address. Format: xxx.xxx.xxx.xxx
    private $_industry;                     //    Specify industry classification of transaction. Values: 'ecommerce', 'moto', or 'retail'
    private $_billing_method;               //  Set additional billing indicators. Values: 'recurring' or 'installment'
    private $_billing_number;               //  Specify installment billing number, on supported processors. For use when "billing-method" is set to installment. Values: 0-99
    private $_billing_total;                //   Specify installment billing total on supported processors. For use when "billing-method" is set to installment.
    private $_processor_id;                 //    If using multiple processors, route to specified processor. Obtained under Settings->Load Balancing in the merchant control panel.
    private $_sec_code;                     //    ACH standard entry class codes. Values: 'PPD', 'WEB', 'TEL', 'CCD', 'POP', or 'ARC'
    private $_descriptor;                   //  Set payment descriptor on supported processors.
    private $_descriptor_phone;             //    Set payment descriptor phone on supported processors.
    private $_descriptor_address;           //  Set payment descriptor address on supported processors.
    private $_descriptor_city;              // Set payment descriptor city on supported processors.
    private $_descriptor_state;             //    Set payment descriptor state on supported processors.
    private $_descriptor_postal;            //   Set payment descriptor postal code on supported processors.
    private $_descriptor_country;           //  Set payment descriptor country on supported processors.
    private $_descriptor_mcc;               //  Set payment descriptor mcc on supported processors.
    private $_descriptor_merchant_id;       //  Set payment descriptor merchant id on supported processors.
    private $_descriptor_url;               //  Set payment descriptor url on supported processors.
    private $_currency;                     //    Set transaction currency. Format: ISO 4217
    private $_order_description;            //   Order description.
    private $_customer_id;                  // Customer identification.
    private $_customer_vault_id;            //   Load customer details from an existing customer vault record. If set, no payment information is required during step two.
    private $_merchant_receipt_email;       //  Send merchant receipt to email
    private $_customer_receipt;             //    Send receipt if billing email included. Values: 'true' or 'false'
    private $_tracking_number;              // Shipping tracking number.
    private $_shipping_carrier;             //    Shipping carrier. Values: 'ups', 'fedex', 'dhl', or 'usps'
    private $_order_id;                     // *** Order id.
    private $_signature_image;              // Cardholder signature image. For use with "sale" and "auth" actions only. Format: base64 encoded raw PNG image. (16kiB maximum)
    private $_po_number;                    // ***    Cardholder's purchase order number.
    private $_tax_amount;                   // ***   The sales tax included in the transaction amount associated with the purchase. Setting tax equal to '-1' indicates an order that is exempt from sales tax. Default: '0.00' Format: x.xx
    private $_shipping_amount;              // ***  Total shipping amount.
    private $_ship_from_postal;             // ***    Postal/ZIP code of the address from where purchased goods are being shipped. Defaults to merchant profile postal code.
    private $_summary_commodity_code;       // ***  A code representing the type of commodity being purchased. The acquirer or processor will provide a list of current codes.
    private $_duty_amount;                  // Amount included in the transaction amount associated with the import of the purchased goods. Default: '0.00'
    private $_discount_amount;              // Amount included in the transaction amount of any discount applied to the complete order by the merchant. Default: '0.00'
    private $_national_tax_amount;          // The national tax amount included in the transaction amount. Default: '0.00'
    private $_alternate_tax_amount;         //    Second tax amount included in the transaction amount in countries where more than one type of tax can be applied to the purchases. Default: '0.00'
    private $_alternate_tax_id;             //    Tax identification number of the merchant that reported the alternate tax amount.
    private $_vat_tax_amount;               //  Contains the amount of any value added taxes which can be associated with the purchased item. Default: '0.00'
    private $_vat_tax_rate;                 //    Contains the tax rate used to calculate the sales tax amount appearing. Can contain up to 2 decimal places, ie 1% = 1.00. Default: '0.00'
    private $_vat_invoice_reference_number; //    Invoice number that is associated with the VAT invoice.
    private $_customer_vat_registration;    //   Value added tax registration number supplied by the cardholder.
    private $_merchant_vat_registration;    //   Government assigned tax identification number of the merchant from whom the goods or services were purchased.
    private $_order_date;                   //  Purchase order date. Defaults to the date of the transaction. Format: YYMMDD
    private $_cardholder_auth;              //†    Set 3D Secure condition. Values: 'verified' or 'attempted'
    private $_eci;                          //†    E-commerce indicator. Values: '0', '1', '2', '5', '6', or '7'
    private $_cavv;                         //†   Cardholder authentication verification value. Format: base64 encoded
    private $_xid;                          //†    Cardholder authentication transaction id. Format: base64 encoded
    private $_initiated_by;                 //    Who initiated the transaction. Values: 'customer' or 'merchant'
    private $_initial_transaction_id;       //  Original payment gateway transaction id.
    private $_stored_credential_indicator;  // The indicator of the stored credential. Values: 'stored' or 'used' Use 'stored' when processing the initial transaction in which you are storing a customer's payment details (customer credentials) in the Customer Vault or other third-party payment storage system. Use 'used' when processing a subsequent or follow-up transaction using the customer payment details (customer credentials) you have already stored to the Customer Vault or third-party payment storage method.
    private $_dup_seconds;                  //‡    Override duplicate transaction detection time in seconds.
    private $_avs_reject;                   //‡ The transaction is rejected if the address verification result is a code in this list. Values are letters obtained under Settings->Address Verification in the control panel. Format: x|x|x|x...
    private $_cvv_reject;                   //‡ The transaction is rejected if the card ID verification result is a code in this list. Values are letters obtained under Settings->Card ID Verification in the control panel. Format: x|x|x|x...

    /**
     * @serializeTag api-key
     * @return string
     */
    final public function get_api_key() : ?string
    {
        return $this->_api_key;
    }

    final public function set_api_key(string $value)
    {
        $this->_api_key = $value;
    }

    /**
     * @serializeTag redirect-url
     * @return string
     */
    final public function get_redirect_url() : ?string
    {
        return $this->_redirect_url;
    }

    final public function set_redirect_url(string $value)
    {
        $this->_redirect_url = $value;
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
     * @serializeTag surcharge-amount
     * @return string
     */
    final public function get_surcharge_amount() : ?string
    {
        return $this->_surcharge_amount;
    }

    final public function set_surcharge_amount(string $value)
    {
        $this->_surcharge_amount = $value;
    }

    /**
     * @serializeTag authorization-code
     * @return string
     */
    final public function get_authorization_code() : ?string
    {
        return $this->_authorization_code;
    }

    final public function set_authorization_code(string $value)
    {
        $this->_authorization_code = $value;
    }

    /**
     * @serializeTag ip-address
     * @return string
     */
    final public function get_ip_address() : ?string
    {
        return $this->_ip_address;
    }

    final public function set_ip_address(string $value)
    {
        $this->_ip_address = $value;
    }

    /**
     * @serializeTag industry
     * @return string
     */
    final public function get_industry() : ?string
    {
        return $this->_industry;
    }

    final public function set_industry(string $value)
    {
        $this->_industry = $value;
    }

    /**
     * @serializeTag billing-method
     * @return string
     */
    final public function get_billing_method() : ?string
    {
        return $this->_billing_method;
    }

    final public function set_billing_method(string $value)
    {
        $this->_billing_method = $value;
    }

    /**
     * @serializeTag billing-number
     * @return string
     */
    final public function get_billing_number() : ?string
    {
        return $this->_billing_number;
    }

    final public function set_billing_number(string $value)
    {
        $this->_billing_number = $value;
    }

    /**
     * @serializeTag billing-total
     * @return string
     */
    final public function get_billing_total() : ?string
    {
        return $this->_billing_total;
    }

    final public function set_billing_total(string $value)
    {
        $this->_billing_total = $value;
    }

    /**
     * @serializeTag processor-id
     * @return string
     */
    final public function get_processor_id() : ?string
    {
        return $this->_processor_id;
    }

    final public function set_processor_id(string $value)
    {
        $this->_processor_id = $value;
    }

    /**
     * @serializeTag sec-code
     * @return string
     */
    final public function get_sec_code() : ?string
    {
        return $this->_sec_code;
    }

    final public function set_sec_code(string $value)
    {
        $this->_sec_code = $value;
    }

    /**
     * @serializeTag descriptor
     * @return string
     */
    final public function get_descriptor() : ?string
    {
        return $this->_descriptor;
    }

    final public function set_descriptor(string $value)
    {
        $this->_descriptor = $value;
    }

    /**
     * @serializeTag descriptor-phone
     * @return string
     */
    final public function get_descriptor_phone() : ?string
    {
        return $this->_descriptor_phone;
    }

    final public function set_descriptor_phone(string $value)
    {
        $this->_descriptor_phone = $value;
    }

    /**
     * @serializeTag descriptor-address
     * @return string
     */
    final public function get_descriptor_address() : ?string
    {
        return $this->_descriptor_address;
    }

    final public function set_descriptor_address(string $value)
    {
        $this->_descriptor_address = $value;
    }

    /**
     * @serializeTag descriptor-city
     * @return string
     */
    final public function get_descriptor_city() : ?string
    {
        return $this->_descriptor_city;
    }

    final public function set_descriptor_city(string $value)
    {
        $this->_descriptor_city = $value;
    }

    /**
     * @serializeTag descriptor-state
     * @return string
     */
    final public function get_descriptor_state() : ?string
    {
        return $this->_descriptor_state;
    }

    final public function set_descriptor_state(string $value)
    {
        $this->_descriptor_state = $value;
    }

    /**
     * @serializeTag descriptor-postal
     * @return string
     */
    final public function get_descriptor_postal() : ?string
    {
        return $this->_descriptor_postal;
    }

    final public function set_descriptor_postal(string $value)
    {
        $this->_descriptor_postal = $value;
    }

    /**
     * @serializeTag descriptor-country
     * @return string
     */
    final public function get_descriptor_country() : ?string
    {
        return $this->_descriptor_country;
    }

    final public function set_descriptor_country(string $value)
    {
        $this->_descriptor_country = $value;
    }

    /**
     * @serializeTag descriptor-mcc
     * @return string
     */
    final public function get_descriptor_mcc() : ?string
    {
        return $this->_descriptor_mcc;
    }

    final public function set_descriptor_mcc(string $value)
    {
        $this->_descriptor_mcc = $value;
    }

    /**
     * @serializeTag descriptor-merchant-id
     * @return string
     */
    final public function get_descriptor_merchant_id() : ?string
    {
        return $this->_descriptor_merchant_id;
    }

    final public function set_descriptor_merchant_id(string $value)
    {
        $this->_descriptor_merchant_id = $value;
    }

    /**
     * @serializeTag descriptor-url
     * @return string
     */
    final public function get_descriptor_url() : ?string
    {
        return $this->_descriptor_url;
    }

    final public function set_descriptor_url(string $value)
    {
        $this->_descriptor_url = $value;
    }

    /**
     * @serializeTag currency
     * @return string
     */
    final public function get_currency() : ?string
    {
        return $this->_currency;
    }

    final public function set_currency(string $value)
    {
        $this->_currency = $value;
    }

    /**
     * @serializeTag order-description
     * @return string
     */
    final public function get_order_description() : ?string
    {
        return $this->_order_description;
    }

    final public function set_order_description(string $value)
    {
        $this->_order_description = $value;
    }

    /**
     * @serializeTag customer-id
     * @return string
     */
    final public function get_customer_id() : ?string
    {
        return $this->_customer_id;
    }

    final public function set_customer_id(string $value)
    {
        $this->_customer_id = $value;
    }

    /**
     * @serializeTag customer-vault-id
     * @return string
     */
    final public function get_customer_vault_id() : ?string
    {
        return $this->_customer_vault_id;
    }

    final public function set_customer_vault_id(string $value)
    {
        $this->_customer_vault_id = $value;
    }

    /**
     * @serializeTag merchant-receipt-email
     * @return string
     */
    final public function get_merchant_receipt_email() : ?string
    {
        return $this->_merchant_receipt_email;
    }

    final public function set_merchant_receipt_email(string $value)
    {
        $this->_merchant_receipt_email = $value;
    }

    /**
     * @serializeTag customer-receipt
     * @return string
     */
    final public function get_customer_receipt() : ?string
    {
        return $this->_customer_receipt;
    }

    final public function set_customer_receipt(string $value)
    {
        $this->_customer_receipt = $value;
    }

    /**
     * @serializeTag tracking-number
     * @return string
     */
    final public function get_tracking_number() : ?string
    {
        return $this->_tracking_number;
    }

    final public function set_tracking_number(string $value)
    {
        $this->_tracking_number = $value;
    }

    /**
     * @serializeTag shipping-carrier
     * @return string
     */
    final public function get_shipping_carrier() : ?string
    {
        return $this->_shipping_carrier;
    }

    final public function set_shipping_carrier(string $value)
    {
        $this->_shipping_carrier = $value;
    }

    /**
     * @serializeTag order-id
     * @return string
     */
    final public function get_order_id() : ?string
    {
        return $this->_order_id;
    }

    final public function set_order_id(string $value)
    {
        $this->_order_id = $value;
    }

    /**
     * @serializeTag signature-image
     * @return string
     */
    final public function get_signature_image() : ?string
    {
        return $this->_signature_image;
    }

    final public function set_signature_image(string $value)
    {
        $this->_signature_image = $value;
    }

    /**
     * @serializeTag po-number
     * @return string
     */
    final public function get_po_number() : ?string
    {
        return $this->_po_number;
    }

    final public function set_po_number(string $value)
    {
        $this->_po_number = $value;
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
     * @serializeTag shipping-amount
     * @return string
     */
    final public function get_shipping_amount() : ?string
    {
        return $this->_shipping_amount;
    }

    final public function set_shipping_amount(string $value)
    {
        $this->_shipping_amount = $value;
    }

    /**
     * @serializeTag ship-from-postal
     * @return string
     */
    final public function get_ship_from_postal() : ?string
    {
        return $this->_ship_from_postal;
    }

    final public function set_ship_from_postal(string $value)
    {
        $this->_ship_from_postal = $value;
    }

    /**
     * @serializeTag summary-commodity-code
     * @return string
     */
    final public function get_summary_commodity_code() : ?string
    {
        return $this->_summary_commodity_code;
    }

    final public function set_summary_commodity_code(string $value)
    {
        $this->_summary_commodity_code = $value;
    }

    /**
     * @serializeTag duty-amount
     * @return string
     */
    final public function get_duty_amount() : ?string
    {
        return $this->_duty_amount;
    }

    final public function set_duty_amount(string $value)
    {
        $this->_duty_amount = $value;
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
     * @serializeTag national-tax-amount
     * @return string
     */
    final public function get_national_tax_amount() : ?string
    {
        return $this->_national_tax_amount;
    }

    final public function set_national_tax_amount(string $value)
    {
        $this->_national_tax_amount = $value;
    }

    /**
     * @serializeTag alternate-tax-amount
     * @return string
     */
    final public function get_alternate_tax_amount() : ?string
    {
        return $this->_alternate_tax_amount;
    }

    final public function set_alternate_tax_amount(string $value)
    {
        $this->_alternate_tax_amount = $value;
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

    /**
     * @serializeTag vat-tax-amount
     * @return string
     */
    final public function get_vat_tax_amount() : ?string
    {
        return $this->_vat_tax_amount;
    }

    final public function set_vat_tax_amount(string $value)
    {
        $this->_vat_tax_amount = $value;
    }

    /**
     * @serializeTag vat-tax-rate
     * @return string
     */
    final public function get_vat_tax_rate() : ?string
    {
        return $this->_vat_tax_rate;
    }

    final public function set_vat_tax_rate(string $value)
    {
        $this->_vat_tax_rate = $value;
    }

    /**
     * @serializeTag vat-invoice-reference-number
     * @return string
     */
    final public function get_vat_invoice_reference_number() : ?string
    {
        return $this->_vat_invoice_reference_number;
    }

    final public function set_vat_invoice_reference_number(string $value)
    {
        $this->_vat_invoice_reference_number = $value;
    }

    /**
     * @serializeTag customer-vat-registration
     * @return string
     */
    final public function get_customer_vat_registration() : ?string
    {
        return $this->_customer_vat_registration;
    }

    final public function set_customer_vat_registration(string $value)
    {
        $this->_customer_vat_registration = $value;
    }

    /**
     * @serializeTag merchant-vat-registration
     * @return string
     */
    final public function get_merchant_vat_registration() : ?string
    {
        return $this->_merchant_vat_registration;
    }

    final public function set_merchant_vat_registration(string $value)
    {
        $this->_merchant_vat_registration = $value;
    }

    /**
     * @serializeTag order-date
     * @return string
     */
    final public function get_order_date() : ?string
    {
        return $this->_order_date;
    }

    final public function set_order_date(string $value)
    {
        $this->_order_date = $value;
    }

    /**
     * @serializeTag cardholder-auth
     * @return string
     */
    final public function get_cardholder_auth() : ?string
    {
        return $this->_cardholder_auth;
    }

    final public function set_cardholder_auth(string $value)
    {
        $this->_cardholder_auth = $value;
    }

    /**
     * @serializeTag eci
     * @return string
     */
    final public function get_eci() : ?string
    {
        return $this->_eci;
    }

    final public function set_eci(string $value)
    {
        $this->_eci = $value;
    }

    /**
     * @serializeTag cavv
     * @return string
     */
    final public function get_cavv() : ?string
    {
        return $this->_cavv;
    }

    final public function set_cavv(string $value)
    {
        $this->_cavv = $value;
    }

    /**
     * @serializeTag xid
     * @return string
     */
    final public function get_xid() : ?string
    {
        return $this->_xid;
    }

    final public function set_xid(string $value)
    {
        $this->_xid = $value;
    }

    /**
     * @serializeTag initiated-by
     * @return string
     */
    final public function get_initiated_by() : ?string
    {
        return $this->_initiated_by;
    }

    final public function set_initiated_by(string $value)
    {
        $this->_initiated_by = $value;
    }

    /**
     * @serializeTag initial-transaction-id
     * @return string
     */
    final public function get_initial_transaction_id() : ?string
    {
        return $this->_initial_transaction_id;
    }

    final public function set_initial_transaction_id(string $value)
    {
        $this->_initial_transaction_id = $value;
    }

    /**
     * @serializeTag stored-credential-indicator
     * @return string
     */
    final public function get_stored_credential_indicator() : ?string
    {
        return $this->_stored_credential_indicator;
    }

    final public function set_stored_credential_indicator(string $value)
    {
        $this->_stored_credential_indicator = $value;
    }

    /**
     * @serializeTag dup-seconds
     * @return string
     */
    final public function get_dup_seconds() : ?string
    {
        return $this->_dup_seconds;
    }

    final public function set_dup_seconds(string $value)
    {
        $this->_dup_seconds = $value;
    }

    /**
     * @serializeTag avs-reject
     * @return string
     */
    final public function get_avs_reject() : ?string
    {
        return $this->_avs_reject;
    }

    final public function set_avs_reject(string $value)
    {
        $this->_avs_reject = $value;
    }

    /**
     * @serializeTag cvv-reject
     * @return string
     */
    final public function get_cvv_reject() : ?string
    {
        return $this->_cvv_reject;
    }

    final public function set_cvv_reject(string $value)
    {
        $this->_cvv_reject = $value;
    }
}
