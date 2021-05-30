<?php

namespace akh\Typograf\Rule\Space;

use akh\Typograf\Rule\AbstractRule;

class Year extends AbstractRule
{
    public $name = 'Пробел между числом и словом год';

    public function handler($text)
    {
        $pattern = '#(^|\s|&nbsp;)([0-9]{3,4})(год([ауе]|ом)?)([^' . $this->char['char'] . ']|$)#iu';

        $replace = '$1$2 $3$5';

        return preg_replace($pattern, $replace, $text);
    }
}