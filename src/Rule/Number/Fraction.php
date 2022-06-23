<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class Fraction extends AbstractRule
{
    public $name = 'Замена дробей 1/2, 1/4, 3/4 на соответствующие символы';

    public $active = false;

    public function handler(string $text): string
    {
        $pattern = [
            '#(^|\D)1/([24])(\D|$)#iu',
            '#(^|\D)3/4(\D|$)#iu',
        ];

        $replace = [
            '$1&frac1$2;$3',
            '$1&frac34;$2',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
