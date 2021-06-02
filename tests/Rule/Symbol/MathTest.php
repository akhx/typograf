<?php

namespace Rule\Symbol;

use Akh\Typograf\Rule\Symbol\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ['4 <= 2', '4 &le; 2'],
            ['1 != 0', '1 &ne; 0'],
            ['5 >= 3', '5 &ge; 3'],
            ['99.99 ~= 100', '99.99 &cong; 100'],
            ['+-', '&plusmn;'],
            ['+-10', '&plusmn;10'],
            ['50000 +-100', '50000 &plusmn;100'],
            ['10-5=5', '10&minus;5=5'],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Math())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
