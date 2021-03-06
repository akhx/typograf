<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\Dash\KaKas;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class KaKasTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
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

        foreach ($arTests as $arTest) {
            $test = (new KaKas())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
