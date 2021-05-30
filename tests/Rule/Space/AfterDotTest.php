<?php

namespace Rule\Space;

use akh\Typograf\Rule\Space\AfterDot;
use PHPUnit\Framework\TestCase;

class AfterDotTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Всё. Конец',
                'Всё. Конец'
            ],
            [
                'test.domain.ru',
                'test.domain.ru'
            ],
            [
                "Солнце садилось за горизонт.Вот",
                "Солнце садилось за горизонт. Вот",
            ],
            [
                "Солнце садилось за горизонт.",
                "Солнце садилось за горизонт.",
            ],
            [
                "Солнце садилось за горизонт.\nСолнце садилось за горизонт.",
                "Солнце садилось за горизонт. \nСолнце садилось за горизонт.",
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new AfterDot())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
