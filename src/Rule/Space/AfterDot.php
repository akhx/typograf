<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class AfterDot extends AbstractRule
{
    public $name = 'Забытый пробел после точки';

    protected $sort = 300;

    public function handler($text)
    {
        $pattern = '#([' . $this->char['char'] . '0-9]{2,})\.([А-ЯЁA-Z\n])#u';

        $replace = '$1. $2';

        return preg_replace($pattern, $replace, $text);
    }
}