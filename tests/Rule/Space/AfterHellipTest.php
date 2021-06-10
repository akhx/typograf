<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\AfterHellip;
use PHPUnit\Framework\TestCase;

class AfterHellipTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Простите, государь!..Стоять я не могу...',
                'Простите, государь!.. Стоять я не могу...'
            ],
            [
                'Не правда ль, ты одна?...Ты плачешь? Я спокоен... Но если... (Пушкин).',
                'Не правда ль, ты одна?...Ты плачешь? Я спокоен... Но если... (Пушкин).'
            ],
            [
                'Не правда ль, ты одна?..Ты плачешь? Я спокоен... Но если... (Пушкин).',
                'Не правда ль, ты одна?.. Ты плачешь? Я спокоен... Но если... (Пушкин).'
            ],
            [
                'Я спокоен...Но если...',
                'Я спокоен... Но если...'
            ],
            [
                'Я спокоен...но если...',
                'Я спокоен...но если...'
            ],
            [
                'Я спокоен…Но если...',
                'Я спокоен… Но если...'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new AfterHellip())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
