<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class DelRepeatSpace extends AbstractRule
{
    public $name = 'Удаление повторяющихся пробелов';

    protected $sort = -100;

    public function handler(string $text): string
    {
        $pattern = '#[ \t]{2,}#u';

        $replace = ' ';

        return preg_replace($pattern, $replace, $text);
    }
}
