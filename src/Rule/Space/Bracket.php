<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class Bracket extends AbstractRule
{
    public $name = 'Удаление лишних пробелов после открывающей и перед закрывающей скобкой';

    public function handler($text)
    {
        $pattern = [
            '#(\()\s+#u',
            '#\s+\)#u',
        ];

        $replace = [
            '(',
            ')'
        ];

        return preg_replace($pattern, $replace, $text);
    }
}