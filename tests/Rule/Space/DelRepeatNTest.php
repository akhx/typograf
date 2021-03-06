<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\DelRepeatN;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DelRepeatNTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                "asdk oasdk\nas\n\n\n\nd koa\n\n\nsd       ",
                "asdk oasdk\nas\nd koa\nsd       ",
            ],
            [
                "Ох\n\n\n",
                "Ох\n",
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelRepeatN())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
