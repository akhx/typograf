<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\BeforeShortLastWord;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class BeforeShortLastWordTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new BeforeShortLastWord();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '27 км Новорижского шоссе, влд. 2',
                '27 км Новорижского шоссе, влд.&nbsp;2',
            ],
            [
                'Fedora, SuSE, Gentoo, Mandrake, or PLD.',
                'Fedora, SuSE, Gentoo, Mandrake, or&nbsp;PLD.',
            ],
            [
                '<p>Голубка дряхлая моя!</p>',
                '<p>Голубка дряхлая&nbsp;моя!</p>',
            ],
            [
                "Голубка дряхлая моя!\nГолубка дряхлая моя!",
                "Голубка дряхлая&nbsp;моя!\nГолубка дряхлая&nbsp;моя!",
            ],
            [
                'Голубка дряхлая моя!',
                'Голубка дряхлая&nbsp;моя!',
            ],
            [
                'Голубка дряхлая моя',
                'Голубка дряхлая&nbsp;моя',
            ],
            [
                '<p>Голубка дряхлая моя</p>',
                '<p>Голубка дряхлая&nbsp;моя</p>',
            ],
            [
                'Голубка дряхлая моя! Куда же ты так.',
                'Голубка дряхлая&nbsp;моя! Куда же ты&nbsp;так.',
            ],
        ];
    }
}
