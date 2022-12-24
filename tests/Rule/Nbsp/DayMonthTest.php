<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\DayMonth;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DayMonthTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DayMonth();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
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
    }
}
