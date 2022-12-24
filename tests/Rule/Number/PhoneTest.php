<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\Phone;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class PhoneTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Phone();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '+792699999991',
                '+792699999991',
            ],
            [
                '+79269999999',
                '+7&thinsp;926&thinsp;999&ndash;99&ndash;99',
            ],
            [
                "+79269999999\n+79269999999",
                "+7&thinsp;926&thinsp;999&ndash;99&ndash;99\n+7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],
            [
                '<a>+79269999999</a>',
                '<a>+7&thinsp;926&thinsp;999&ndash;99&ndash;99</a>',
            ],
            [
                "10\n+79269999999",
                "10\n+7&thinsp;926&thinsp;999&ndash;99&ndash;99",
            ],
            [
                'мой номер +79269999999',
                'мой номер +7&thinsp;926&thinsp;999&ndash;99&ndash;99',
            ],
            [
                "<a href='tel:+79269999999'>+79269999999</a>",
                "<a href='tel:+79269999999'>+7&thinsp;926&thinsp;999&ndash;99&ndash;99</a>",
            ],
        ];
    }
}
