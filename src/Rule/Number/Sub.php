<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class Sub extends AbstractRule
{
    public $name = 'Нижний индекс для _{n}';

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . '0-9])_{([^}]+)}([^@' . $this->char['char'] . '0-9]|$)#iu';
        $replace = '$1<sub>$2</sub>$3';

        return preg_replace($pattern, $replace, $text);
    }
}
