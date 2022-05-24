<?php

namespace Akh\Typograf\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;

class DelBeforePercent extends AbstractRule
{
    public $name = 'Удаление пробела перед знаками процентов';

    protected $sort = 300;

    public function handler(string $text): string
    {
        $pattern = '#(\d)(\s|&nbsp;)([%‰‱])#iu';

        $replace = '$1$3';

        return preg_replace($pattern, $replace, $text);
    }
}
