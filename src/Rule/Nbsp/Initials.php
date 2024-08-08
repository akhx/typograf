<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class Initials extends AbstractRule
{
    public $name = 'Неразрывной пробел инициалов и фамилии';

    public function handler(string $text): string
    {
        $pattern = '#(^|[\s>' . $this->char['allQuote'] . '])(\p{Lu}\.)\s?(\p{Lu}\.)\s?(\p{Lu}\p{Ll}+)#iu';
        $replace = '$1$2' . $this->char['nbsp'] . '$3' . $this->char['nbsp'] . '$4';

        return preg_replace($pattern, $replace, $text);
    }
}
