<?php

namespace Rule\Number;

use Akh\Typograf\Rule\Number\Fraction;
use PHPUnit\Framework\TestCase;

class FractionTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ["qqq 1/2", "qqq &frac12;"],
            [' 1/2 ', ' &frac12; '],
            ['1/4', '&frac14;'],
            [' 1/4 ', ' &frac14; '],
            ['3/4', '&frac34;'],
            [' 3/4 ', ' &frac34; ']
        ];

        foreach ($arTests as $arTest) {
            $test = (new Fraction())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
