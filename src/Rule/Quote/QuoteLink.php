<?php

namespace Akh\Typograf\Rule\Quote;

use Akh\Typograf\Rule\AbstractRule;

class QuoteLink extends AbstractRule
{
    public $name = 'Кавычки вне тэга <a>';

    public function handler($text)
    {
        $pattern = '#(<a[^>]+>)([' . $this->char['allQuote'] . '])(.+?)([' . $this->char['allQuote'] . '])(</a>)#iu';
        $replace = '$2$1$3$5$4';

        return preg_replace($pattern, $replace, $text);
    }
}