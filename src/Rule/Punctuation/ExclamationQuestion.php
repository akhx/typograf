<?php

namespace Akh\Typograf\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;

class ExclamationQuestion extends AbstractRule
{
    public $name = 'Замена восклицательного и вопросительного знаков местами';

    public $sort = 800;

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . '])!\?(\s|$|<)#iu';

        $replace = '$1?!$2';

        return preg_replace($pattern, $replace, $text);
    }
}
