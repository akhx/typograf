<?php

namespace Akh\Typograf\Tests\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Punctuation\DelDouble;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelDoubleTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelDouble();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'У меня была только синяя краска;; но,, несмотря на это,,, я,,,, затеял нарисовать охоту.',
                'У меня была только синяя краска; но, несмотря на это, я, затеял нарисовать охоту.',
            ],
            [
                'Никогда;;; не отказывайся от малого в работе:: из малого::: строится великое.',
                'Никогда; не отказывайся от малого в работе: из малого: строится великое.',
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
            [
                'Привет;;',
                'Привет;',
            ],
            [
                'Привет;;;',
                'Привет;',
            ],
            [
                '&laquo;Привет&raquo;, мир!',
                '&laquo;Привет&raquo;, мир!',
            ],
            [
                '- &laquo;Привет1&raquo;;',
                '- &laquo;Привет1&raquo;;',
            ],
            [
                '- &laquo;Привет2&raquo;;;',
                '- &laquo;Привет2&raquo;;',
            ],
        ];
    }
}
