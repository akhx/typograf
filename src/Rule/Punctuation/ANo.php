<?php

namespace akh\Typograf\Rule\Punctuation;

use akh\Typograf\Rule\AbstractRule;

class ANo extends AbstractRule
{
    public $name = 'Расстановка запятых перед а, но';

    protected $sort = 300;

    public function handler($text)
    {
        $pattern = '#([' . $this->char['char'] . '])(\s|&nbsp;)(а|но)(\s|&nbsp;)#iu';

        $replace = '$1,$2$3$4';

        return preg_replace($pattern, $replace, $text);
    }
}