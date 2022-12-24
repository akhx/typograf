<?php

namespace Akh\Typograf\Tests\Rule\Html;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Html\Paragraph;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ParagraphTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Paragraph();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                ' 123 дня ',
                '<p>123 дня</p>',
            ],
            [
                "123 дня\n123 дня",
                "<p>123 дня\n123 дня</p>",
            ],
            [
                '2 кошки',
                '<p>2 кошки</p>',
            ],
            [
                '<p>один параграф</p>',
                '<p>один параграф</p>',
            ],
            [
                '   test<p>один параграф</p>',
                '<p>test</p><p>один параграф</p>',
            ],
            [
                '<p>один параграф</p> test ',
                '<p>один параграф</p><p>test</p>',
            ],
        ];
    }
}
