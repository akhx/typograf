<?php

namespace Akh\Typograf\Tests\Rule\Punctuation;

use Akh\Typograf\Rule\Punctuation\DelDouble;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DelDoubleTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                'У меня была только синяя краска;; но,, несмотря на это,, я затеял нарисовать охоту.',
                'У меня была только синяя краска; но, несмотря на это, я затеял нарисовать охоту.',
            ],
            [
                'Никогда не отказывайся от малого в работе:: из малого строится великое.',
                'Никогда не отказывайся от малого в работе: из малого строится великое.',
            ],
            [
                'Что??????',
                'Что???',
            ],
            [
                'То!!!!!!',
                'То!!!',
            ],
            [
                'Ура!!',
                'Ура!',
            ],
            [
                '.......',
                '...',
            ],
            [
                'Опа!???',
                'Опа!???',
            ],
            [
                'Опа!?????',
                'Опа!???',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new DelDouble())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
