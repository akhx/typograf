<?php

namespace akh\Typograf\Rule\Symbol;

use akh\Typograf\Rule\AbstractRule;

class Arrow extends AbstractRule
{
    public $name = 'Стрелочки разные -> → →, <- → ←';

    public function handler($text)
    {
        $pattern = [
            '#<<#iu',
            '#>>#iu',
            '#(^|[^-])->(?!>)#iu',
            '#(^|[^<])<-(?!-)#iu'
        ];

        $replace = [
            '&Lt;',
            '&Gt;',
            '$1&rarr;',
            '$1&larr;'
        ];

        return preg_replace($pattern, $replace, $text);
    }
}