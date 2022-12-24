<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\AfterHellip;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class AfterHellipTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new AfterHellip();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Простите, государь!..Стоять я не могу...',
                'Простите, государь!.. Стоять я не могу...',
            ],
            [
                'Не правда ль, ты одна?...Ты плачешь? Я спокоен... Но если... (Пушкин).',
                'Не правда ль, ты одна?...Ты плачешь? Я спокоен... Но если... (Пушкин).',
            ],
            [
                'Не правда ль, ты одна?..Ты плачешь? Я спокоен... Но если... (Пушкин).',
                'Не правда ль, ты одна?.. Ты плачешь? Я спокоен... Но если... (Пушкин).',
            ],
            [
                'Я спокоен...Но если...',
                'Я спокоен... Но если...',
            ],
            [
                'Я спокоен...но если...',
                'Я спокоен...но если...',
            ],
            [
                'Я спокоен…Но если...',
                'Я спокоен… Но если...',
            ],
        ];
    }
}
