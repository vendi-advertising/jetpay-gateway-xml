<?php declare(strict_types=1);
namespace Vendi\PaymentGateways\JetPay\Xml;

final class AVSResponseCodes
{
    //Stupid name, need something better, this is just a placeholder
    public static $all = [
                            'X' => 'Exact match, 9-character numeric ZIP',
                            'Y' => 'Exact match, 5-character numeric ZIP',
                            'D' => 'Exact match, 5-character numeric ZIP',
                            'M' => 'Exact match, 5-character numeric ZIP',
                            '2' => 'Exact match, 5-character numeric ZIP, customer name',
                            '6' => 'Exact match, 5-character numeric ZIP, customer name',
                            'A' => 'Address match only',
                            'B' => 'Address match only',
                            '3' => 'Address, customer name match only',
                            '7' => 'Address, customer name match only',
                            'W' => '9-character numeric ZIP match only',
                            'Z' => '5-character ZIP match only',
                            'P' => '5-character ZIP match only',
                            'L' => '5-character ZIP match only',
                            '1' => '5-character ZIP, customer name match only',
                            '5' => '5-character ZIP, customer name match only',
                            'N' => 'No address or ZIP match only',
                            'C' => 'No address or ZIP match only',
                            '4' => 'No address or ZIP or customer name match only',
                            '8' => 'No address or ZIP or customer name match only',
                            'U' => 'Address unavailable',
                            'G' => 'Non-U.S. issuer does not participate',
                            'I' => 'Non-U.S. issuer does not participate',
                            'R' => 'Issuer system unavailable',
                            'E' => 'Not a mail/phone order',
                            'S' => 'Service not supported',
                            '0' => 'AVS not available',
                            'O' => 'AVS not available',
                            'B' => 'AVS not available',
                        ];
}
