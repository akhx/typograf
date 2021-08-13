<?php

namespace Akh\Typograf\Rule\Symbol;

use Akh\Typograf\Rule\AbstractRule;

class Math extends AbstractRule
{
    public $name = 'Математические знаки больше, меньше, плюс, равно, умножить';

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
            '#(\d+)(\s|&nbsp;)*[xх](\s|&nbsp;)*(\d+)([^' . $this->char['char'] . ']|$)#iu',
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
            '$1&times;$4$5',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
