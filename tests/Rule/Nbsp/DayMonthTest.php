<?php

namespace Rule\Nbsp;

use akh\Typograf\Rule\Nbsp\DayMonth;
use PHPUnit\Framework\TestCase;

class DayMonthTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ['20 декабря', '20&nbsp;декабря'],
            ['20 дек 2010', '20&nbsp;дек 2010'],
            ['1 мая 2015', '1&nbsp;мая 2015']
        ];

        foreach ($arTests as $arTest) {
            $test = (new DayMonth())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
