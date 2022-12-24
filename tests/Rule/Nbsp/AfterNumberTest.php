<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\AfterNumber;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class AfterNumberTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new AfterNumber();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                ' 123 дня ',
                ' 123&nbsp;дня ',
            ],
            [
                "123 дня\n123 дня",
                "123&nbsp;дня\n123&nbsp;дня",
            ],
            [
                '<p>123 дня</p>',
                '<p>123&nbsp;дня</p>',
            ],
            [
                '2 кошки',
                '2&nbsp;кошки',
            ],
            [
                '12 миллиардов рублей',
                '12&nbsp;миллиардов рублей',
            ],
            [
                '20 years',
                '20&nbsp;years',
            ],
            [
                'Кукурузные палочки Кузя Лакомкин 85 г',
                'Кукурузные палочки Кузя Лакомкин 85&nbsp;г',
            ],
        ];
    }
}
