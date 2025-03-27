<?php

namespace Seworqs\Commons;

use PHPUnit\Framework\TestCase;
use Seworqs\Commons\Helper\FinancialHelper;

class FinancialCalculationsTest extends TestCase
{
    public function testExToIn()
    {
        $in = FinancialHelper::fromExToIn(14.98, 21);
        $this->assertEquals(18.1258, $in);

        $in = FinancialHelper::fromExToIn(10, 21);
        $this->assertEquals(12.1, $in);
    }

    public function testInToEx()
    {
        $in = FinancialHelper::fromInToEx(10, 21);
        $this->assertEquals(8.264462809917354, $in);

        $in = FinancialHelper::fromInToEx(12.1, 21);
        $this->assertEquals(10, $in);
    }

    public function testInExCalculations()
    {
        $expected = [
            'input'      => [
                'amount'     => 10,
                'percentage' => 21,
                'count'      => 10
            ],
            'fromExToIn' => [
                'ex'         => 10,
                'in'         => 12.1,
                'multiplied' => [
                    'ex' => 100,
                    'in' => 121,
                ]
            ],
            'fromInToEx' => [
                'ex'         => 8.264462809917354,
                'in'         => 10,
                'multiplied' => [
                    'ex' => 82.64462809917354,
                    'in' => 100,
                ]
            ]
        ];

        $actual = FinancialHelper::getInExCalculations(10, 21, 10);

        $this->assertEquals($expected, $actual);
    }
}