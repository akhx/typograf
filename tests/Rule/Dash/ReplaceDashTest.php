<?php

namespace Rule\Dash;

use akh\Typograf\Rule\Dash\ReplaceDash;
use PHPUnit\Framework\TestCase;

class ReplaceDashTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Правда - небольшая ложь',
                'Правда&nbsp;&mdash; небольшая ложь'
            ],
            [
                'Правда —— небольшая ложь',
                'Правда&nbsp;&mdash; небольшая ложь'
            ],
            [
                'Правда -&nbsp;небольшая ложь',
                'Правда&nbsp;&mdash;&nbsp;небольшая ложь'
            ],
            [
                "Сатрап смутился изумленный -\nИ гнев в нем душу помрачил...",
                "Сатрап смутился изумленный&nbsp;&mdash;\nИ гнев в нем душу помрачил..."
            ],
            [
                'одно- или двухэтажный корпус',
                'одно- или двухэтажный корпус'
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new ReplaceDash())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
