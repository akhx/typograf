<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Dash\ToLiboNebud;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ToLiboNebudTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new ToLiboNebud();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'когда то',
                'когда-то',
            ],
            [
                '<p>когда то</p>',
                '<p>когда-то</p>',
            ],
            [
                "когда то\nкогда то",
                "когда-то\nкогда-то",
            ],
            ['Какой либо', 'Какой-либо'],
            ['откуда либо', 'откуда-либо'],
            ['откуда -либо', 'откуда-либо'],
            ['откуда- либо', 'откуда-либо'],
            ['откуда - либо', 'откуда - либо'],
            ['Кто нибудь', 'Кто-нибудь'],
            ['кое у кого, кое в чем', 'кое у кого, кое в чем'],
            ['кое с какими', 'кое с какими'],
            ['когда то&nbsp;мы', 'когда-то мы'],
        ];
    }
}
