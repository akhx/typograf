<?php

namespace Rule\Space;

use akh\Typograf\Rule\Space\Year;
use PHPUnit\Framework\TestCase;

class YearTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "В 2002году",
                "В 2002 году"
            ],
            [
                "Шёл 2010год.",
                "Шёл 2010 год."
            ],
            [
                "на всём протяжении 1997года\n",
                "на всём протяжении 1997 года\n"
            ],
            [
                "\n\nНачавшиеся в 1957году экономические реформы были слишком поверхностными,",
                "\n\nНачавшиеся в 1957 году экономические реформы были слишком поверхностными,"
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new Year())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
