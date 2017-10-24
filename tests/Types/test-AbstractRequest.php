<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Types\SaleRequest;

class test_AbstractRequest extends jetpay_test_base
{
    use XpathAssertions;

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_api_key
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_api_key
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_redirect_url
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_redirect_url
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_surcharge_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_surcharge_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_authorization_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_authorization_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_ip_address
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_ip_address
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_industry
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_industry
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_billing_method
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_billing_method
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_billing_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_billing_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_billing_total
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_billing_total
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_processor_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_processor_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_sec_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_sec_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_phone
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_phone
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_address
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_address
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_city
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_city
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_state
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_state
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_country
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_country
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_mcc
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_mcc
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_merchant_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_merchant_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_descriptor_url
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_descriptor_url
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_currency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_currency
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_order_description
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_order_description
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_customer_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_customer_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_customer_vault_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_customer_vault_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_merchant_receipt_email
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_merchant_receipt_email
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_customer_receipt
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_customer_receipt
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_tracking_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_tracking_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_shipping_carrier
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_shipping_carrier
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_order_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_order_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_signature_image
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_signature_image
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_po_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_po_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_shipping_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_shipping_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_ship_from_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_ship_from_postal
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_summary_commodity_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_summary_commodity_code
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_duty_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_duty_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_discount_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_discount_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_national_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_national_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_alternate_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_alternate_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_alternate_tax_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_alternate_tax_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_vat_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_vat_tax_amount
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_vat_tax_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_vat_tax_rate
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_vat_invoice_reference_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_vat_invoice_reference_number
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_customer_vat_registration
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_customer_vat_registration
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_merchant_vat_registration
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_merchant_vat_registration
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_order_date
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_order_date
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_cardholder_auth
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_cardholder_auth
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_eci
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_eci
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_cavv
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_cavv
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_xid
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_xid
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_initiated_by
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_initiated_by
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_initial_transaction_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_initial_transaction_id
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_stored_credential_indicator
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_stored_credential_indicator
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_dup_seconds
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_dup_seconds
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_avs_reject
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_avs_reject
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::set_cvv_reject
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractRequest::get_cvv_reject
     *
     * @dataProvider provider_for_test__xml_stuff
     * @param mixed $property_name
     * @param mixed $xml_tag_name
     * @param mixed $root
     */
    public function test__xml_stuff($property_name, $xml_tag_name, $root)
    {
        $setter = "set_$property_name";
        $getter = "get_$property_name";

        $obj = new SaleRequest();
        $obj->$setter('CHEESE');

        $this->assertSame('CHEESE', $obj->$getter());

        $document = new \DOMDocument();
        $document->loadXML($obj->__toXml());

        self::assertXpathEquals("<$xml_tag_name>CHEESE</$xml_tag_name>", "//$root/$xml_tag_name", $document);
    }

    public function provider_for_test__xml_stuff()
    {
        return [
                    [ 'api_key', 'api-key', 'sale'],
                    [ 'redirect_url', 'redirect-url', 'sale'],
                    [ 'amount', 'amount', 'sale'],
                    [ 'surcharge_amount', 'surcharge-amount', 'sale'],
                    [ 'authorization_code', 'authorization-code', 'sale'],
                    [ 'ip_address', 'ip-address', 'sale'],
                    [ 'industry', 'industry', 'sale'],
                    [ 'billing_method', 'billing-method', 'sale'],
                    [ 'billing_number', 'billing-number', 'sale'],
                    [ 'billing_total', 'billing-total', 'sale'],
                    [ 'processor_id', 'processor-id', 'sale'],
                    [ 'sec_code', 'sec-code', 'sale'],
                    [ 'descriptor', 'descriptor', 'sale'],
                    [ 'descriptor_phone', 'descriptor-phone', 'sale'],
                    [ 'descriptor_address', 'descriptor-address', 'sale'],
                    [ 'descriptor_city', 'descriptor-city', 'sale'],
                    [ 'descriptor_state', 'descriptor-state', 'sale'],
                    [ 'descriptor_postal', 'descriptor-postal', 'sale'],
                    [ 'descriptor_country', 'descriptor-country', 'sale'],
                    [ 'descriptor_mcc', 'descriptor-mcc', 'sale'],
                    [ 'descriptor_merchant_id', 'descriptor-merchant-id', 'sale'],
                    [ 'descriptor_url', 'descriptor-url', 'sale'],
                    [ 'currency', 'currency', 'sale'],
                    [ 'order_description', 'order-description', 'sale'],
                    [ 'customer_id', 'customer-id', 'sale'],
                    [ 'customer_vault_id', 'customer-vault-id', 'sale'],
                    [ 'merchant_receipt_email', 'merchant-receipt-email', 'sale'],
                    [ 'customer_receipt', 'customer-receipt', 'sale'],
                    [ 'tracking_number', 'tracking-number', 'sale'],
                    [ 'shipping_carrier', 'shipping-carrier', 'sale'],
                    [ 'order_id', 'order-id', 'sale'],
                    [ 'signature_image', 'signature-image', 'sale'],
                    [ 'po_number', 'po-number', 'sale'],
                    [ 'tax_amount', 'tax-amount', 'sale'],
                    [ 'shipping_amount', 'shipping-amount', 'sale'],
                    [ 'ship_from_postal', 'ship-from-postal', 'sale'],
                    [ 'summary_commodity_code', 'summary-commodity-code', 'sale'],
                    [ 'duty_amount', 'duty-amount', 'sale'],
                    [ 'discount_amount', 'discount-amount', 'sale'],
                    [ 'national_tax_amount', 'national-tax-amount', 'sale'],
                    [ 'alternate_tax_amount', 'alternate-tax-amount', 'sale'],
                    [ 'alternate_tax_id', 'alternate-tax-id', 'sale'],
                    [ 'vat_tax_amount', 'vat-tax-amount', 'sale'],
                    [ 'vat_tax_rate', 'vat-tax-rate', 'sale'],
                    [ 'vat_invoice_reference_number', 'vat-invoice-reference-number', 'sale'],
                    [ 'customer_vat_registration', 'customer-vat-registration', 'sale'],
                    [ 'merchant_vat_registration', 'merchant-vat-registration', 'sale'],
                    [ 'order_date', 'order-date', 'sale'],
                    [ 'cardholder_auth', 'cardholder-auth', 'sale'],
                    [ 'eci', 'eci', 'sale'],
                    [ 'cavv', 'cavv', 'sale'],
                    [ 'xid', 'xid', 'sale'],
                    [ 'initiated_by', 'initiated-by', 'sale'],
                    [ 'initial_transaction_id', 'initial-transaction-id', 'sale'],
                    [ 'stored_credential_indicator', 'stored-credential-indicator', 'sale'],
                    [ 'dup_seconds', 'dup-seconds', 'sale'],
                    [ 'avs_reject', 'avs-reject', 'sale'],
                    [ 'cvv_reject', 'cvv-reject', 'sale'],
        ];
    }
}
