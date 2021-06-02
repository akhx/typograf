<?php

namespace Akh\Typograf\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;

class Math extends AbstractRule
{
    public $name = 'Математические знаки больше, меньше, плюс, равно';

    public $active = false;

    public function handler($text)
    {
        $pattern = [
            '#!=#iu',
            '#\<=#iu',
            '#(^|[^=])>=#iu',
            '#~=#iu',
            '#(^|[^+])\+-#iu',
            '#<<#iu',
            '#>>#iu',
            '#(\d)-(\d)#iu',
        ];

        $replace = [
            '&ne;',
            '&le;',
            '$1&ge;',
            '&cong;',
            '$1&plusmn;',
            '&Lt;',
            '&Gt;',
            '$1&minus;$2',
            '$1→',
            '$1←'
        ];

        return preg_replace($pattern, $replace, $text);
    }
}