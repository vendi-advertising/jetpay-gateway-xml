<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml;

final class CVVResponseCodes
{
    //Stupid name, need something better, this is just a placeholder
    public static $all = [
                            'M' => 'CVV2/CVC2 match',
                            'N' => 'CVV2/CVC2 no match',
                            'P' => 'Not processed',
                            'S' => 'Merchant has indicated that CVV2/CVC2 is not present on card',
                            'U' => 'Issuer is not certified and/or has not provided Visa encryption keys',
                        ];
}
