<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class AfterNumber extends AbstractRule
{
    public $name = 'Неразрывной пробел, после чисел';

    protected $settings = [
        'maxLen' => 5,
    ];

    public function handler(string $text): string
    {
        $pattern = '#(^|\D)(\d{1,' . $this->settings['maxLen'] . '}) ([' . $this->char['char'] . ']+)#iu';
        $replace = '$1$2' . $this->char['nbsp'] . '$3';

        return preg_replace($pattern, $replace, $text);
    }
}
