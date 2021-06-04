<?php

namespace Rule\Number;

use Akh\Typograf\Rule\Number\Sup;
use PHPUnit\Framework\TestCase;

class SupTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ['2^2', '2<sup>2</sup>'],
            [
                "площадь помещения 24^2",
                "площадь помещения 24<sup>2</sup>"
            ],
            [
                "площадь помещения 24^2\nплощадь помещения 24^2",
                "площадь помещения 24<sup>2</sup>\nплощадь помещения 24<sup>2</sup>"
            ],
            [
                "<p>площадь помещения 24^2</p>",
                "<p>площадь помещения 24<sup>2</sup></p>"
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Sup())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
