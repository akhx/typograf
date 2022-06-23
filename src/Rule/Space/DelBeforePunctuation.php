<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class DelBeforePunctuation extends AbstractRule
{
    public $name = 'Удаление пробела перед знаками препинания';

    protected $sort = 300;

    public function handler(string $text): string
    {
        $pattern = '#((\s|&nbsp;)+)([' . $this->char['charEnd'] . '])(\s+|$)#iu';

        $replace = '$3$4';

        return preg_replace($pattern, $replace, $text);
    }
}
