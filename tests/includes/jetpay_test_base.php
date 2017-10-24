<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests;

use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class jetpay_test_base extends TestCase
{
    public function _get_test_card_number_visa()
    {
        return '4111111111111111';
    }

    public function _get_test_card_number_master_card()
    {
        return '5431111111111111';
    }

    public function _get_test_card_number_discover()
    {
        return '6011601160116611';
    }

    public function _get_test_card_number_amex()
    {
        return '341111111111111';
    }

    public function _get_test_card_expiration_month_year()
    {
        return '10/25';
    }

    public function _get_test_ach_account()
    {
        return '123123123';
    }

    public function _get_test_ach_routing()
    {
        return '123123123';
    }

    public function _get_test_amount()
    {
        return '1.00';
    }

    public function _get_test_amount_failure()
    {
        return '0.99';
    }

    /**
     * PHPUnit 6+ compatibility shim.
     *
     * @param mixed      $exception
     * @param string     $message
     * @param int|string $code
     */
    public function setExpectedException( $exception, $message = '', $code = null ) {
        if ( method_exists( 'PHPUnit_Framework_TestCase', 'setExpectedException' ) ) {
            parent::setExpectedException( $exception, $message, $code );
        } else {
            $this->expectException( $exception );
            if ( '' !== $message ) {
                $this->expectExceptionMessage( $message );
            }
            if ( null !== $code ) {
                $this->expectExceptionCode( $code );
            }
        }
    }

    /*
Triggering Errors in Test Mode
To cause a declined message, pass an amount less than 1.00.
To trigger a fatal error message, pass an invalid card number.
To simulate an AVS match, pass 888 in the address1 field, 77777 for zip.
To simulate a CVV match, pass 999 in the cvv field.
     */
}
