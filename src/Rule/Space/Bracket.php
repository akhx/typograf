<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class Bracket extends AbstractRule
{
    public $name = 'Удаление лишних пробелов после открывающей и перед закрывающей скобкой';

    public function handler(string $text): string
    {
        $pattern = [
            '#(\()\s+#u',
            '#\s+\)#u',
        ];

        $replace = [
            '(',
            ')',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
