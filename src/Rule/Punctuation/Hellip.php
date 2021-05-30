<?php

namespace akh\Typograf\Rule\Punctuation;

use akh\Typograf\Rule\AbstractRule;

class Hellip extends AbstractRule
{
    public $name = 'Замена трёх точек на многоточие';

    protected $sort = 800;

    public function handler($text)
    {
        $pattern = '#(\.\.\.)#iu';

        $replace = '&hellip;';

        return preg_replace($pattern, $replace, $text);
    }
}