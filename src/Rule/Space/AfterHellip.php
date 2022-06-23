<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class AfterHellip extends AbstractRule
{
    public $name = 'Пробел после знаков троеточий и троеточий с вопросительным или восклицательными знаками';

    protected $sort = 800;

    public function handler(string $text): string
    {
        $pattern = [
            '#([' . $this->char['char'] . '])(\.\.\.|…)([А-ЯЁ])#u',
            '#([?!]\.\.)([' . $this->char['char'] . ']|$)#iu',
        ];

        $replace = [
            '$1$2 $3',
            '$1 $2',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
