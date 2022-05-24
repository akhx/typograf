<?php

namespace Akh\Typograf\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;

class Apostrophe extends AbstractRule
{
    public $name = 'Расстановка правильного апострофа в текстах';

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . ']+)\'([' . $this->char['char'] . ']+)#iu';

        $replace = '$1&rsquo;$2';

        return preg_replace($pattern, $replace, $text);
    }
}
