<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class DelBeforeLine extends AbstractRule
{
    public $name = 'Удаление пробелов в начале строки';

    protected $sort = -100;

    public function handler(string $text): string
    {
        $pattern = '#^[ \t]+#mu';

        $replace = '';

        return preg_replace($pattern, $replace, $text);
    }
}
