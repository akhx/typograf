<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\DelBeforePunctuation;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelBeforePunctuationTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelBeforePunctuation();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'В неполном предложении отсутствует один или несколько членов , значение которых понятно из контекста или из ситуации.',
                'В неполном предложении отсутствует один или несколько членов, значение которых понятно из контекста или из ситуации.',
            ],
            [
                'Армия пролетариев, встань стройна !',
                'Армия пролетариев, встань стройна!',
            ],
            [
                "Печально я гляжу на наше поколенье !\nПечально я гляжу на наше поколенье !",
                "Печально я гляжу на наше поколенье!\nПечально я гляжу на наше поколенье!",
            ],
            [
                'Fantastic, we closed the deal !',
                'Fantastic, we closed the deal!',
            ],
            [
                'Were the visitors shown the new pictures ?',
                'Were the visitors shown the new pictures?',
            ],
        ];
    }
}
