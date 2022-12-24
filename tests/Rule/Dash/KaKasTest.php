<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Dash\KaKas;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class KaKasTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new KaKas();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '<p>скажите ка на ка? на-кась!</p>',
                '<p>скажите-ка на-ка? на-кась!</p>',
            ],
            [
                'ну ка, ну кась нате ка! нате кась?',
                'ну-ка, ну-кась нате-ка! нате-кась?',
            ],
            [
                'Ну ка',
                'Ну-ка',
            ],
            [
                "Ну ка\nНу ка",
                "Ну-ка\nНу-ка",
            ],
            [
                'нате кась',
                'нате-кась',
            ],
        ];
    }
}
