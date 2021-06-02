<?php

namespace Rule\Number;

use Akh\Typograf\Rule\Number\Sub;
use PHPUnit\Framework\TestCase;

class SubTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ['2_{2} 2_{2}', '2<sub>2</sub> 2<sub>2</sub>'],
            [
                'x_{ab}',
                'x<sub>ab</sub>'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new Sub())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
