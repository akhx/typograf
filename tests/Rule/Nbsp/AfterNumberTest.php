<?php

namespace Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\AfterNumber;
use PHPUnit\Framework\TestCase;

class AfterNumberTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                ' 123 дня ',
                ' 123&nbsp;дня '
            ],
            [
                "123 дня\n123 дня",
                "123&nbsp;дня\n123&nbsp;дня"
            ],
            [
                "<p>123 дня</p>",
                "<p>123&nbsp;дня</p>"
            ],
            [
                '2 кошки',
                '2&nbsp;кошки'
            ],
            [
                '12 миллиардов рублей',
                '12&nbsp;миллиардов рублей'
            ],
            [
                '20 years',
                '20&nbsp;years'
            ],
            [
                'Кукурузные палочки Кузя Лакомкин 85 г',
                'Кукурузные палочки Кузя Лакомкин 85&nbsp;г'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new AfterNumber)->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
