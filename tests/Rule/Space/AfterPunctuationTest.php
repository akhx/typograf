<?php

namespace Rule\Space;

use akh\Typograf\Rule\Space\AfterPunctuation;
use PHPUnit\Framework\TestCase;

class AfterPunctuationTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Солнце:a',
                'Солнце: a'
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер. Вот.',
                'Солнце садилось за горизонт, и поднялся ветер. Вот.'
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер!Вот.',
                'Солнце садилось за горизонт, и поднялся ветер! Вот.'
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер?Вот.',
                'Солнце садилось за горизонт, и поднялся ветер? Вот.'
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер??Вот.',
                'Солнце садилось за горизонт, и поднялся ветер?? Вот.'
            ],
            [
                'Солнце садилось за горизонт,?',
                'Солнце садилось за горизонт,?'
            ],
            [
                '"Я!"',
                '"Я!"'
            ],
            [
                '«Я!»',
                '«Я!»'
            ],
            [
                '‹I!›',
                '‹I!›'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new AfterPunctuation())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
