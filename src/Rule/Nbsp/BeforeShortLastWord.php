<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class BeforeShortLastWord extends AbstractRule
{
    public $name = 'Неразрывной пробел перед последним коротким словом в предложении';

    protected $settings = [
        'len' => 3,
    ];

    public function handler(string $text): string
    {
        $pattern = [
            '#(\S)\s([' . $this->char['char'] . '\d]{1,' . $this->settings['len'] . '}[.!?…])(\s[' . $this->char['char'] . ']|<|$)#iu',
            '#(\S)\s([' . $this->char['char'] . '\d]{1,' . $this->settings['len'] . '})($|<)#iu',
        ];

        $replace = [
            '$1' . $this->char['nbsp'] . '$2$3',
            '$1' . $this->char['nbsp'] . '$2$3',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
