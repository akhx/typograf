<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class DelRepeatN extends AbstractRule
{
    public $name = 'Удаление повторяющихся переносов строки';

    protected $sort = -100;

    public function handler(string $text): string
    {
        $pattern = '#\n{2,}#u';

        $replace = "\n";

        return preg_replace($pattern, $replace, $text);
    }
}
