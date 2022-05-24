<?php

namespace Akh\Typograf\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;

class ANo extends AbstractRule
{
    public $name = 'Расстановка запятых перед а, но';

    protected $sort = 300;

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . '])(\s|&nbsp;)(а|но)(\s|&nbsp;)#iu';

        $replace = '$1,$2$3$4';

        return preg_replace($pattern, $replace, $text);
    }
}
