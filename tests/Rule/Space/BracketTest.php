<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\Bracket;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class BracketTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Bracket();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                ' ( ) ',
                ' () ',
            ],
            [
                "\n\n( \n\n )\n\n",
                "\n\n()\n\n",
            ],
            [
                '     (    abc     abc         )     (    abc     )   ( a ( b ( c )  )  )    ',
                '     (abc     abc)     (abc)   (a (b (c)))    ',
            ],
        ];
    }
}
