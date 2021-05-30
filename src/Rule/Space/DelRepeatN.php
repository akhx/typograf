<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class DelRepeatN extends AbstractRule
{
    public $name = 'Удаление повторяющихся переносов строки';

    protected $sort = -100;

    public function handler($text)
    {
        $pattern = '#\n{2,}#u';

        $replace = "\n";

        return preg_replace($pattern, $replace, $text);
    }
}