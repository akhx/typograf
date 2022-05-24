<?php

namespace Akh\Typograf\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;

class Hellip extends AbstractRule
{
    public $name = 'Замена трёх точек на многоточие';

    protected $sort = 800;

    public function handler(string $text): string
    {
        $pattern = '#(\.\.\.)#iu';

        $replace = '&hellip;';

        return preg_replace($pattern, $replace, $text);
    }
}
