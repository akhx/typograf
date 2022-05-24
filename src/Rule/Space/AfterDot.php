<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class AfterDot extends AbstractRule
{
    public $name = 'Забытый пробел после точки';

    protected $sort = 300;

    public function handler(string $text): string
    {
        $pattern = '#([' . $this->char['char'] . '0-9]{2,})\.([А-ЯЁA-Z\n])#u';

        $replace = '$1. $2';

        return preg_replace($pattern, $replace, $text);
    }
}
