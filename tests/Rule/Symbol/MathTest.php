<?php

namespace Akh\Typograf\Tests\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Symbol\Math;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class MathTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Math();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            // ru
            [
                '2х2',
                '2&times;2',
            ],
            [
                "2х2\n2х2",
                "2&times;2\n2&times;2",
            ],
            [
                '<p>2х2</p>',
                '<p>2&times;2</p>',
            ],
            // en
            ['2x2', '2&times;2'],
            ['2 x 2', '2&times;2'],
            ['4 <= 2', '4 &le; 2'],
            ['1 != 0', '1 &ne; 0'],
            ['5 >= 3', '5 &ge; 3'],
            ['99.99 ~= 100', '99.99 &cong; 100'],
            ['+-', '&plusmn;'],
            ['+-10', '&plusmn;10'],
            ['50000 +-100', '50000 &plusmn;100'],
            ['10-5=5', '10&minus;5=5'],
        ];
    }
}
