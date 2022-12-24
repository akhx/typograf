<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\DimensionSup;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DimensionSupTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DimensionSup();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '2cm2',
                '2cm<sup>2</sup>',
            ],
            [
                "2cm2\n2cm2",
                "2cm<sup>2</sup>\n2cm<sup>2</sup>",
            ],
            [
                '<p>2cm2</p>',
                '<p>2cm<sup>2</sup></p>',
            ],
            ['2см2', '2см<sup>2</sup>'],
            [
                'площадь помещения 24м2',
                'площадь помещения 24м<sup>2</sup>',
            ],
        ];
    }
}
