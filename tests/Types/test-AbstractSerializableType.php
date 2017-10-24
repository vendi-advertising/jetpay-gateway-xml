<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml\Tests\Types;

use PHPUnit\Xpath\Assert as XpathAssertions;
use Vendi\PaymentGateways\JetPay\Xml\Tests\jetpay_test_base;
use Vendi\PaymentGateways\JetPay\Xml\Tests\Mocks\mock_for_AbstractSerializableType;
use Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType;

/**
 * @group AbstractSerializableType
 */
class test_AbstractSerializableType extends jetpay_test_base
{
    use XpathAssertions;

    private function _get_mock()
    {
        return new mock_for_AbstractSerializableType();
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple_null()
    {
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple(false));
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple(null));
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple(''));
    }

    /**
     * @covers \Vendi\PaymentGateways\JetPay\Xml\Types\AbstractSerializableType::_get_serializeTag_name_and_value_tuple
     */
    public function test__get_serializeTag_name_and_value_tuple_empty_lines()
    {
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\n"));
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\r\n"));
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\r"));
        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple(' '));

        $this->assertNull(AbstractSerializableType::_get_serializeTag_name_and_value_tuple("\n\n"));
    }
}
