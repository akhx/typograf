<?php

namespace Rule\Space;

use akh\Typograf\Rule\Space\DelBeforePunctuation;
use PHPUnit\Framework\TestCase;

class DelBeforePunctuationTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'В неполном предложении отсутствует один или несколько членов , значение которых понятно из контекста или из ситуации.',
                'В неполном предложении отсутствует один или несколько членов, значение которых понятно из контекста или из ситуации.'
            ],
            [
                'Армия пролетариев, встань стройна !',
                'Армия пролетариев, встань стройна!'
            ],
            [
                "Печально я гляжу на наше поколенье !\nПечально я гляжу на наше поколенье !",
                "Печально я гляжу на наше поколенье!\nПечально я гляжу на наше поколенье!"
            ],
            [
                'Fantastic, we closed the deal !',
                'Fantastic, we closed the deal!'
            ],
            [
                'Were the visitors shown the new pictures ?',
                'Were the visitors shown the new pictures?'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelBeforePunctuation())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
