<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class Triad extends AbstractRule
{
    public $name = 'Разбиение числа на триады';

    public $sort = 800;

    public function handler($text)
    {
        return preg_replace_callback(
            '#(^| |&nbsp;)([0-9]{5,})( |&nbsp;|$)#iu',
            function ($matches) {
                $num = str_replace(
                    ' ',
                    '&thinsp;',
                    number_format($matches[2], 0, '', ' ')
                );
                return $matches[1] . $num . $matches[3];
            },
            $text
        );
    }
}