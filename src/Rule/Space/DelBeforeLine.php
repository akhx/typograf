<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class DelBeforeLine extends AbstractRule
{
    public $name = 'Удаление пробелов в начале строки';

    protected $sort = -100;

    public function handler($text)
    {
        $pattern = '#^[ \t]+#mu';

        $replace = '';

        return preg_replace($pattern, $replace, $text);
    }
}