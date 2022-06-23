<?php

namespace Akh\Typograf\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;

class ToLiboNebud extends AbstractRule
{
    public $name = 'Дефис перед «то», «либо», «нибудь»';
    public $sort = 300;

    public function handler(string $text): string
    {
        $words = [
            'откуда',
            'куда',
            'где',
            'когда',
            'зачем',
            'почему',
            'как',
            'како[ейм]',
            'какая',
            'каки[емх]',
            'какими',
            'какую',
            'что',
            'чего',
            'че[йм]',
            'чьим?',
            'кто',
            'кого',
            'кому',
            'кем',
        ];

        $group = implode('|', $words);
        $pattern = '#(' . $group . ')-?(\s|&nbsp;)-?(то|либо|нибудь)([' . $this->char['charEnd'] . ']|\s|<|&nbsp;|$)#iu';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return $matches[1] . '-' . $matches[3] . ('&nbsp;' === $matches[4] ? ' ' : $matches[4]);
            },
            $text
        );
    }
}
