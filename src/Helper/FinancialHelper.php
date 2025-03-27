<?php

declare(strict_types=1);

namespace Seworqs\Commons\Helper;

class FinancialHelper
{

    public static function fromExToIn(float|int $amount, float|int $percentage): float|int
    {
        return $amount * (100 + $percentage) / 100;
    }

    public static function fromInToEx(float|int $amount, float|int $percentage): float|int
    {
        return $amount * 100 / (100 + $percentage);
    }

    static function getInExCalculations($amount, $percentage, $count = 1)
    {

        $in = self::fromExToIn($amount, $percentage);
        $ex = self::fromInToEx($amount, $percentage);

        return [
            'input'      => [
                'amount'     => $amount,
                'percentage' => $percentage,
                'count'      => $count
            ],
            'fromExToIn' => [
                'ex'         => $amount,
                'in'         => $in,
                'multiplied' => [
                    'ex' => $amount * $count,
                    'in' => $in * $count,
                ]
            ],
            'fromInToEx' => [
                'ex'         => $ex,
                'in'         => $amount,
                'multiplied' => [
                    'ex' => $ex * $count,
                    'in' => $amount * $count,
                ]
            ]
        ];
    }
}
