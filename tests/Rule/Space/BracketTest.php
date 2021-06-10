<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\Bracket;
use PHPUnit\Framework\TestCase;

class BracketTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                " ( ) ",
                " () "
            ],
            [
                "\n\n( \n\n )\n\n",
                "\n\n()\n\n"
            ],
            [
                "     (    abc     abc         )     (    abc     )   ( a ( b ( c )  )  )    ",
                "     (abc     abc)     (abc)   (a (b (c)))    "
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new Bracket())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
