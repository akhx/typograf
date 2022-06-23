<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\Number\Sub;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class SubTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            ['2_{2} 2_{2}', '2<sub>2</sub> 2<sub>2</sub>'],
            [
                'x_{ab}',
                'x<sub>ab</sub>',
            ],
            [
                '<p>x_{ab}</p>',
                '<p>x<sub>ab</sub></p>',
            ],
            [
                "x_{ab}\nx_{ab}",
                "x<sub>ab</sub>\nx<sub>ab</sub>",
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new Sub())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
