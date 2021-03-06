<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\ReplaceNbsp;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class ReplaceNbspTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                'Флойд&nbsp;Мэйуэзер&nbsp;одержал&nbsp;49-ю&nbsp;победу&nbsp;и&nbsp;объявил&nbsp;о&nbsp;завершении карьеры',
                'Флойд Мэйуэзер одержал 49-ю победу и объявил о завершении карьеры',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new ReplaceNbsp())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
