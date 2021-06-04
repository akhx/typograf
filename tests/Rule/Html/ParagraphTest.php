<?php

namespace Rule\Html;

use Akh\Typograf\Rule\Html\Paragraph;
use PHPUnit\Framework\TestCase;

class ParagraphTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                ' 123 дня ',
                '<p>123 дня</p>'
            ],
            [
                "123 дня\n123 дня",
                "<p>123 дня\n123 дня</p>"
            ],
            [
                '2 кошки',
                '<p>2 кошки</p>'
            ],
            [
                "<p>один параграф</p>",
                "<p>один параграф</p>"
            ],
            [
                "   test<p>один параграф</p>",
                "<p>test</p><p>один параграф</p>"
            ],
            [
                "<p>один параграф</p> test ",
                "<p>один параграф</p><p>test</p>"
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new Paragraph)->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
