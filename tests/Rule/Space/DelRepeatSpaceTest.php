<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\DelRepeatSpace;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelRepeatSpaceTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelRepeatSpace();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                "     a   \t   ",
                ' a ',
            ],
            [
                "  &nbsp;   z   \t   ",
                ' &nbsp; z ',
            ],
            [
                "  \n  \n  Hello   world  !  \n  \n  ",
                " \n \n Hello world ! \n \n ",
            ],
        ];
    }
}
