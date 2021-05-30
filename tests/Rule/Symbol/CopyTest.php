<?php

namespace Rule\Symbol;

use akh\Typograf\Rule\Symbol\Copy;
use PHPUnit\Framework\TestCase;

class CopyTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            ['(c)', '&copy;'],
            ['(с)', '&copy;'],
            ['Copyright (с)', '&copy;'],
            ['copyright (с)', '&copy;'],
            ['(r)', '&reg;'],
            ['(tm)', '&trade;']
        ];

        foreach ($arTests as $arTest) {
            $test = (new Copy())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
