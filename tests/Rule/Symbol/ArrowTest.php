<?php

namespace Rule\Symbol;

use Akh\Typograf\Rule\Symbol\Arrow;
use PHPUnit\Framework\TestCase;

class ArrowTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "<-\n<-",
                "&larr;\n&larr;"
            ],
            [
                "<p><-</p>",
                "<p>&larr;</p>"
            ],
            ['10000000 >> 1', '10000000 &Gt; 1'],
            ['1 << 10000000', '1 &Lt; 10000000'],
            ['234 >> 5', '234 &Gt; 5'],
            ['<-', '&larr;'],
            ['->', '&rarr;'],
            ['20 + 10 -> 30', '20 + 10 &rarr; 30'],
            ['20 + 10 <- 30', '20 + 10 &larr; 30'],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Arrow())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
