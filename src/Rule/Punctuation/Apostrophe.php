<?php

namespace akh\Typograf\Rule\Punctuation;

use akh\Typograf\Rule\AbstractRule;

class Apostrophe extends AbstractRule
{
    public $name = 'Расстановка правильного апострофа в текстах';

    public function handler($text)
    {
        $pattern = '#([' . $this->char['char'] . ']+)\'([' . $this->char['char'] . ']+)#iu';

        $replace = '$1&rsquo;$2';

        return preg_replace($pattern, $replace, $text);
    }
}