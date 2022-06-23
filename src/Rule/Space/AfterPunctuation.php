<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class AfterPunctuation extends AbstractRule
{
    public $name = 'Пробел после знаков пунктуации, кроме точки';

    protected $sort = 300;

    public function handler(string $text): string
    {
        $pattern = '#(\s|&nbsp;|^)([' . $this->char['char'] . '0-9]+)(\s|&nbsp;)?(:|\)|,|&hellip;|[!?]+)([' . $this->char['char'] . '])#iu';

        $replace = '$1$2$4 $5';

        return preg_replace($pattern, $replace, $text);
    }
}
