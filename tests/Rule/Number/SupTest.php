<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\Sup;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class SupTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Sup();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            ['2^2', '2<sup>2</sup>'],
            [
                'площадь помещения 24^2',
                'площадь помещения 24<sup>2</sup>',
            ],
            [
                "площадь помещения 24^2\nплощадь помещения 24^2",
                "площадь помещения 24<sup>2</sup>\nплощадь помещения 24<sup>2</sup>",
            ],
            [
                '<p>площадь помещения 24^2</p>',
                '<p>площадь помещения 24<sup>2</sup></p>',
            ],
        ];
    }
}
