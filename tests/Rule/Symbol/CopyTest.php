<?php

namespace Akh\Typograf\Tests\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Symbol\Copy;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class CopyTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Copy();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '<p>(c)</p>',
                '<p>&copy;</p>',
            ],
            [
                "(c)\n(c)",
                "&copy;\n&copy;",
            ],
            ['(c)', '&copy;'],
            ['(с)', '&copy;'],
            ['Copyright (с)', '&copy;'],
            ['copyright (с)', '&copy;'],
            ['(r)', '&reg;'],
            ['(tm)', '&trade;'],
        ];
    }
}
