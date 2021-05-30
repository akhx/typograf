<?php

namespace akh\Typograf\Rule\Punctuation;

use akh\Typograf\Rule\AbstractRule;

class ExclamationQuestion extends AbstractRule
{
    public $name = 'Замена восклицательного и вопросительного знаков местами';

    public $sort = 800;

    public function handler($text)
    {

        $pattern = '#([' . $this->char['char'] . '])!\?(\s|$|<)#iu';

        $replace = '$1?!$2';

        return preg_replace($pattern, $replace, $text);
    }
}