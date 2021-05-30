<?php

namespace Rule\Space;

use akh\Typograf\Rule\Space\DelRepeatSpace;
use PHPUnit\Framework\TestCase;

class DelRepeatSpaceTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "     a   \t   ",
                " a "
            ],
            [
                "  &nbsp;   z   \t   ",
                " &nbsp; z "
            ],
            [
                "  \n  \n  Hello   world  !  \n  \n  ", 
                " \n \n Hello world ! \n \n "
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelRepeatSpace())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
