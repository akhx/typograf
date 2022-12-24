<?php

namespace Akh\Typograf\Tests\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Symbol\Arrow;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ArrowTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Arrow();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                "<-\n<-",
                "&larr;\n&larr;",
            ],
            [
                '<p><-</p>',
                '<p>&larr;</p>',
            ],
            ['10000000 >> 1', '10000000 &Gt; 1'],
            ['1 << 10000000', '1 &Lt; 10000000'],
            ['234 >> 5', '234 &Gt; 5'],
            ['<-', '&larr;'],
            ['->', '&rarr;'],
            ['20 + 10 -> 30', '20 + 10 &rarr; 30'],
            ['20 + 10 <- 30', '20 + 10 &larr; 30'],
        ];
    }
}
