<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\Dash\ToLiboNebud;
use PHPUnit\Framework\TestCase;

class ToLiboNebudTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "когда то",
                "когда-то"
            ],
            [
                "<p>когда то</p>",
                "<p>когда-то</p>"
            ],
            [
                "когда то\nкогда то",
                "когда-то\nкогда-то"
            ],
            ['Какой либо', 'Какой-либо'],
            ['откуда либо', 'откуда-либо'],
            ['откуда -либо', 'откуда-либо'],
            ['откуда- либо', 'откуда-либо'],
            ['откуда - либо', 'откуда - либо'],
            ['Кто нибудь', 'Кто-нибудь'],
            ['кое у кого, кое в чем', 'кое у кого, кое в чем'],
            ['кое с какими', 'кое с какими'],
            ['когда то&nbsp;мы', 'когда-то мы']
        ];

        foreach ($arTests as $arTest) {
            $test = (new ToLiboNebud())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
