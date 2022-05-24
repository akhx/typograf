<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class BeforeBracket extends AbstractRule
{
    public $name = 'Пробел перед открывающей скобкой';

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . $this->char['charEnd'] . '…)])\(#iu';

        $replace = '$1 (';

        return preg_replace($pattern, $replace, $text);
    }
}
