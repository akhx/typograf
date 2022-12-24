<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\Ordinal;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class OrdinalTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Ordinal();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '5-ая',
                '5-я',
            ],
            [
                '<p>5-ая</p>',
                '<p>5-я</p>',
            ],
            [
                "5-ая\n5-ая",
                "5-я\n5-я",
            ],
            ['5-ый', '5-й'],
            ['3%-ый', '3%-й'],
            ['102-ой', '102-й'],
            ['2-ое', '2-е'],
            ['К 13-ому марта', 'К 13-му марта'],
            ['22-ого июля', '22-го июля'],
            ['Будите 121-ыми', 'Будите 121-ми'],
            ['4-ых', '4-х'],
        ];
    }
}
