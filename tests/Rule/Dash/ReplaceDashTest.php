<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\Dash\ReplaceDash;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class ReplaceDashTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                'Правда - небольшая ложь',
                'Правда&nbsp;&mdash; небольшая ложь',
            ],
            [
                '<p>Правда - небольшая ложь</p>',
                '<p>Правда&nbsp;&mdash; небольшая ложь</p>',
            ],
            [
                "Правда - небольшая ложь\nПравда - небольшая ложь",
                "Правда&nbsp;&mdash; небольшая ложь\nПравда&nbsp;&mdash; небольшая ложь",
            ],
            [
                'Правда —— небольшая ложь',
                'Правда&nbsp;&mdash; небольшая ложь',
            ],
            [
                'Правда -&nbsp;небольшая ложь',
                'Правда&nbsp;&mdash;&nbsp;небольшая ложь',
            ],
            [
                "Сатрап смутился изумленный -\nИ гнев в нем душу помрачил...",
                "Сатрап смутился изумленный&nbsp;&mdash;\nИ гнев в нем душу помрачил...",
            ],
            [
                'одно- или двухэтажный корпус',
                'одно- или двухэтажный корпус',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new ReplaceDash())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
