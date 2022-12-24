<?php

namespace Akh\Typograf\Tests\Rule\Quote;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Quote\QuoteLink;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class QuoteLinkTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new QuoteLink();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'test <a href="/">"Название"</a> test',
                'test "<a href="/">Название</a>" test',
            ],
            [
                "<a href=\"/\">«Название»</a>\n<a\nhref=\"/\">«Название\n2»</a>",
                "«<a href=\"/\">Название</a>»\n«<a\nhref=\"/\">Название\n2</a>»",
            ],
        ];
    }
}
