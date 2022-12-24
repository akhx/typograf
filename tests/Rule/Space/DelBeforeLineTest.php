<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\DelBeforeLine;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelBeforeLineTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelBeforeLine();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                "Hello world!  \t \n \t \t  Hello world!       \n\n\n\n   \t\t\t   Hello world!\n",
                "Hello world!  \t \nHello world!       \n\n\n\nHello world!\n",
            ],
            [
                "       \t Hello world!  \t \n \t \t  Hello world!\n",
                "Hello world!  \t \nHello world!\n",
            ],
            ['   Hello world!    ', 'Hello world!    '],
        ];
    }
}
