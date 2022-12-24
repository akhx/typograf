<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Dash\ReplaceDash;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ReplaceDashTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new ReplaceDash();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
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
    }
}
