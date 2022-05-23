<?php

namespace Akh\Typograf\Tests\Rule\Symbol;

use Akh\Typograf\Rule\Symbol\Copy;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class CopyTest extends TestCase
{
    public function testHandler()
    {
        $arTests = [
            [
                '<p>(c)</p>',
                '<p>&copy;</p>',
            ],
            [
                "(c)\n(c)",
                "&copy;\n&copy;",
            ],
            ['(c)', '&copy;'],
            ['(с)', '&copy;'],
            ['Copyright (с)', '&copy;'],
            ['copyright (с)', '&copy;'],
            ['(r)', '&reg;'],
            ['(tm)', '&trade;'],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Copy())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
