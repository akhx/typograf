<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\Initials;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class InitialsTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Initials();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'балет им. П. И. Чайковского',
                'балет им. П.&nbsp;И.&nbsp;Чайковского',
            ],
            [
                'А.С. Пушкин',
                'А.&nbsp;С.&nbsp;Пушкин',
            ],
            [
                '<p>А.С. Пушкин</p>',
                '<p>А.&nbsp;С.&nbsp;Пушкин</p>',
            ],
            [
                'А.С. Пушкин-Кукушкин',
                'А.&nbsp;С.&nbsp;Пушкин-Кукушкин',
            ],
            [
                '"А.С. Пушкин"',
                '"А.&nbsp;С.&nbsp;Пушкин"',
            ],
            [
                'А. С. Пушкин',
                'А.&nbsp;С.&nbsp;Пушкин',
            ],
            [
                'А.С. Пушкин, М. Ю. Лермонтов и другие',
                'А.&nbsp;С.&nbsp;Пушкин, М.&nbsp;Ю.&nbsp;Лермонтов и другие',
            ],
        ];
    }
}
