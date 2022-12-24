<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\AfterDot;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class AfterDotTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new AfterDot();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Всё. Конец',
                'Всё. Конец',
            ],
            [
                'test.domain.ru',
                'test.domain.ru',
            ],
            [
                'Солнце садилось за горизонт.Вот',
                'Солнце садилось за горизонт. Вот',
            ],
            [
                'Солнце садилось за горизонт.',
                'Солнце садилось за горизонт.',
            ],
            [
                "Солнце садилось за горизонт.\nСолнце садилось за горизонт.",
                "Солнце садилось за горизонт. \nСолнце садилось за горизонт.",
            ],
        ];
    }
}
