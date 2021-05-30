<?php

namespace Rule\Quote;

use akh\Typograf\Rule\Quote\QuoteLink;
use PHPUnit\Framework\TestCase;

class QuoteLinkTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'test <a href="/">"Название"</a> test',
                'test "<a href="/">Название</a>" test'
            ],
            [
                '<a href="/">«Название»</a>\n<a\nhref="/">«Название\n2»</a>',
                '«<a href="/">Название</a>»\n«<a\nhref="/">Название\n2</a>»'
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new QuoteLink())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
