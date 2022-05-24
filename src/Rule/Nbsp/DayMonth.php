<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class DayMonth extends AbstractRule
{
    public $name = 'Нераз. пробел между числом и месяцем';

    public function handler(string $text): string
    {
        $pattern = '#(\d{1,2}) (' . $this->char['monthShort'] . ')#iu';
        $replace = '$1' . $this->char['nbsp'] . '$2';

        return preg_replace($pattern, $replace, $text);
    }
}
