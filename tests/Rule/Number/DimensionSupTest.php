<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\Number\DimensionSup;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DimensionSupTest extends TestCase
{
    public function testHandler()
    {
        $arTests = [
            [
                '2cm2',
                '2cm<sup>2</sup>',
            ],
            [
                "2cm2\n2cm2",
                "2cm<sup>2</sup>\n2cm<sup>2</sup>",
            ],
            [
                '<p>2cm2</p>',
                '<p>2cm<sup>2</sup></p>',
            ],
            ['2см2', '2см<sup>2</sup>'],
            [
                'площадь помещения 24м2',
                'площадь помещения 24м<sup>2</sup>',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DimensionSup())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
