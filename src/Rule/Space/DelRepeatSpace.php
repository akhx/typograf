<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class DelRepeatSpace extends AbstractRule
{
    public $name = 'Удаление повторяющихся пробелов';

    protected $sort = -100;

    public function handler($text)
    {
        $pattern = '#[ \t]{2,}#u';

        $replace = " ";

        return preg_replace($pattern, $replace, $text);
    }
}