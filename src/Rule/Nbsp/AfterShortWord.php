<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class AfterShortWord extends AbstractRule
{
    public $name = 'Неразрывной пробел, после короткого слова';

    protected $settings = [
        'len' => 2,
    ];

    public function handler($text)
    {
        $before = '\s(' . $this->char['allQuote'];
        $pattern = '#(^|' . $this->char['nbsp'] . '|[' . $before . '])([' . $this->char['char'] . ']{1,' . $this->settings['len'] . '})\s#iu';
        $replace = '$1$2' . $this->char['nbsp'];

        /**
         * Преобразовение вызывается 2 раза
         */
        $text = preg_replace($pattern, $replace, $text);
        return preg_replace($pattern, $replace, $text);
    }
}