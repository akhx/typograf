<?php

namespace akh\Typograf\Rule\Dash;

use akh\Typograf\Rule\AbstractRule;

class ReplaceDash extends AbstractRule
{
    public $name = 'Замена дефиса на тире + исправление дублей, перед типографированием';

    protected $settings = [
        'len' => 2,
    ];

    protected $sort = -100;

    public function handler($text)
    {
        $pattern = '#(\s|&nbsp;)(' . $this->char['allDash'] . '){1,' . $this->settings['len'] . '}(\s|&nbsp;)#iu';
        $replace = $this->char['nbsp'] . $this->char['dash'] . '$3';

        return preg_replace($pattern, $replace, $text);
    }
}