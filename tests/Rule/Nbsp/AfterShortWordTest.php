<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\AfterShortWord;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class AfterShortWordTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                'Повторять, пока;не свернётся в навык.',
                'Повторять, пока;не свернётся в&nbsp;навык.',
            ],
            [
                "Повторять, пока;не свернётся в навык.\nПовторять, пока;не свернётся в навык.",
                "Повторять, пока;не свернётся в&nbsp;навык.\nПовторять, пока;не свернётся в&nbsp;навык.",
            ],
            [
                '<p>Повторять, пока;не свернётся в навык.</p>',
                '<p>Повторять, пока;не свернётся в&nbsp;навык.</p>',
            ],
            [
                'Повторять, пока процесс не свернётся в навык.',
                'Повторять, пока процесс не&nbsp;свернётся в&nbsp;навык.',
            ],
            [
                'ТУ 14577-234-224',
                'ТУ&nbsp;14577-234-224',
            ],
            [
                'И вещи',
                'И&nbsp;вещи',
            ],
            [
                'И в Москве',
                'И&nbsp;в&nbsp;Москве',
            ],
            [
                'если целесообразно использовать в издании спец. сокращения (т. е. принятые только в спец. видах литературы и видах издания)',
                'если целесообразно использовать в&nbsp;издании спец. сокращения (т. е. принятые только в&nbsp;спец. видах литературы и&nbsp;видах издания)',
            ],
            [
                'если целесообразно использовать в издании спец. сокращения (<a href="/other/">т. е. принятые только в спец. видах литературы и видах издания</a>)',
                'если целесообразно использовать в&nbsp;издании спец. сокращения (<a href="/other/">т. е. принятые только в&nbsp;спец. видах литературы и&nbsp;видах издания</a>)',
            ],
            [
                'Быль "О солдате"',
                'Быль "О&nbsp;солдате"',
            ],
            [
                'Сказка "О царе Салтане"\nБыль "О солдате',
                'Сказка "О&nbsp;царе Салтане"\nБыль "О&nbsp;солдате',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new AfterShortWord())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
