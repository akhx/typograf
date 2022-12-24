<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\ReplaceNbsp;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ReplaceNbspTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new ReplaceNbsp();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Флойд&nbsp;Мэйуэзер&nbsp;одержал&nbsp;49-ю&nbsp;победу&nbsp;и&nbsp;объявил&nbsp;о&nbsp;завершении карьеры',
                'Флойд Мэйуэзер одержал 49-ю победу и объявил о завершении карьеры',
            ],
        ];
    }
}
