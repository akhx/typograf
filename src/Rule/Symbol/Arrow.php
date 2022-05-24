<?php

namespace Akh\Typograf\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;

class Arrow extends AbstractRule
{
    public $name = 'Стрелочки разные -> → →, <- → ←';

    public function handler(string $text): string
    {
        $pattern = [
            '#<<#iu',
            '#>>#iu',
            '#(^|[^-])->(?!>)#iu',
            '#(^|[^<])<-(?!-)#iu',
        ];

        $replace = [
            '&Lt;',
            '&Gt;',
            '$1&rarr;',
            '$1&larr;',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
