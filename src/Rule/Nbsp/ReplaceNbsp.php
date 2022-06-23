<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class ReplaceNbsp extends AbstractRule
{
    public $name = 'Замена неразрывного пробела на обычный перед типографированием';

    protected $sort = -100;

    protected $active = false;

    public function handler(string $text): string
    {
        return str_replace($this->char['nbsp'], ' ', $text);
    }
}
