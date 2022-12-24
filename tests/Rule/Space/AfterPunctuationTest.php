<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\AfterPunctuation;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class AfterPunctuationTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new AfterPunctuation();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Солнце:a',
                'Солнце: a',
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер. Вот.',
                'Солнце садилось за горизонт, и поднялся ветер. Вот.',
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер!Вот.',
                'Солнце садилось за горизонт, и поднялся ветер! Вот.',
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер?Вот.',
                'Солнце садилось за горизонт, и поднялся ветер? Вот.',
            ],
            [
                'Солнце садилось за горизонт,и поднялся ветер??Вот.',
                'Солнце садилось за горизонт, и поднялся ветер?? Вот.',
            ],
            [
                'Солнце садилось за горизонт,?',
                'Солнце садилось за горизонт,?',
            ],
            [
                '"Я!"',
                '"Я!"',
            ],
            [
                '«Я!»',
                '«Я!»',
            ],
            [
                '‹I!›',
                '‹I!›',
            ],
        ];
    }
}
