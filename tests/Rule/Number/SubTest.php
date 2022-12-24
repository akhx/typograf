<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\Sub;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class SubTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Sub();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            ['2_{2} 2_{2}', '2<sub>2</sub> 2<sub>2</sub>'],
            [
                'x_{ab}',
                'x<sub>ab</sub>',
            ],
            [
                '<p>x_{ab}</p>',
                '<p>x<sub>ab</sub></p>',
            ],
            [
                "x_{ab}\nx_{ab}",
                "x<sub>ab</sub>\nx<sub>ab</sub>",
            ],
        ];
    }
}
