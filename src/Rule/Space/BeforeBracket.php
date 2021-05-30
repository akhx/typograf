<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class BeforeBracket extends AbstractRule
{
    public $name = 'Пробел перед открывающей скобкой';

    public function handler($text)
    {
        $pattern = '#([' . $this->char['char'] . $this->char['charEnd'] . '…)])\(#iu';

        $replace = '$1 (';

        return preg_replace($pattern, $replace, $text);
    }
}