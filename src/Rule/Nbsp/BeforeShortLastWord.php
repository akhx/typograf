<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class BeforeShortLastWord extends AbstractRule
{
    public $name = 'Неразрывной пробел перед последним коротким словом в предложении';

    protected $settings = [
        'len' => 3,
    ];

    public function handler($text)
    {
        $pattern = [
            '#([' . $this->char['char'] . '\d])\s([' . $this->char['char'] . ']{1,' . $this->settings['len'] . '}[.!?…])(\s[' . $this->char['char'] . ']|<|$)#iu',
            '#([' . $this->char['char'] . '\d])\s([' . $this->char['char'] . ']{1,' . $this->settings['len'] . '})($|<)#iu'
        ];

        $replace = [
            '$1' . $this->char['nbsp'] . '$2$3',
            '$1' . $this->char['nbsp'] . '$2$3',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
