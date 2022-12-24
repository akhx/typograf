<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\DelRepeatN;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelRepeatNTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelRepeatN();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                "asdk oasdk\nas\n\n\n\nd koa\n\n\nsd       ",
                "asdk oasdk\nas\nd koa\nsd       ",
            ],
            [
                "Ох\n\n\n",
                "Ох\n",
            ],
        ];
    }
}
