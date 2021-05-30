<?php

namespace akh\Typograf\Rule\Nbsp;

use akh\Typograf\Rule\AbstractRule;

class ReplaceNbsp extends AbstractRule
{
    public $name = 'Замена неразрывного пробела на обычный перед типографированием';

    protected $sort = -100;

    protected $active = false;

    public function handler($text)
    {
        return str_replace($this->char['nbsp'], ' ', $text);
    }
}