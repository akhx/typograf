<?php

namespace Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\BeforeShortLastWord;
use PHPUnit\Framework\TestCase;

class BeforeShortLastWordTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Fedora, SuSE, Gentoo, Mandrake, or PLD.',
                'Fedora, SuSE, Gentoo, Mandrake, or&nbsp;PLD.'
            ],
            [
                '<p>Голубка дряхлая моя!</p>',
                '<p>Голубка дряхлая&nbsp;моя!</p>'
            ],
            [
                'Голубка дряхлая моя!',
                'Голубка дряхлая&nbsp;моя!'
            ],
            [
                'Голубка дряхлая моя',
                'Голубка дряхлая&nbsp;моя'
            ],
            [
                '<p>Голубка дряхлая моя</p>',
                '<p>Голубка дряхлая&nbsp;моя</p>'
            ],
            [
                'Голубка дряхлая моя! Куда же ты так.',
                'Голубка дряхлая&nbsp;моя! Куда же ты&nbsp;так.'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new BeforeShortLastWord())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
