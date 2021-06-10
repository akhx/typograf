<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\DelBeforePercent;
use PHPUnit\Framework\TestCase;

class DelBeforePercentTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                '20 %',
                '20%'
            ],
            [
                '20 ‰',
                '20‰'
            ],
            [
                '20 ‱',
                '20‱'
            ],
            [
                'около 4&nbsp;%',
                'около 4%'
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelBeforePercent())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
