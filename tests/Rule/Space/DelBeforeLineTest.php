<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\DelBeforeLine;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DelBeforeLineTest extends TestCase
{
    public function testHandler()
    {
        $arTests = [
            [
                "Hello world!  \t \n \t \t  Hello world!       \n\n\n\n   \t\t\t   Hello world!\n",
                "Hello world!  \t \nHello world!       \n\n\n\nHello world!\n",
            ],
            [
                "       \t Hello world!  \t \n \t \t  Hello world!\n",
                "Hello world!  \t \nHello world!\n",
            ],
            ['   Hello world!    ', 'Hello world!    '],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelBeforeLine())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
