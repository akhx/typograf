<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\DayMonth;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DayMonthTest extends TestCase
{
    public function testHandler()
    {
        $arTests = [
            [
                '20 декабря',
                '20&nbsp;декабря',
            ],
            [
                '<p>20 декабря</p>',
                '<p>20&nbsp;декабря</p>',
            ],
            [
                "20 декабря\n20 декабря",
                "20&nbsp;декабря\n20&nbsp;декабря",
            ],
            ['20 дек 2010', '20&nbsp;дек 2010'],
            ['1 мая 2015', '1&nbsp;мая 2015'],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DayMonth())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
