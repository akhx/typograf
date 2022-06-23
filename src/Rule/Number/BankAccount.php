<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class BankAccount extends AbstractRule
{
    public $name = 'Разбиение номер счёта в банке';

    public function handler(string $text): string
    {
        return preg_replace_callback(
            '#(^| |>|&nbsp;)([0-9]{20})( |<|&nbsp;|$)#mu',
            function ($matches) {
                $arNum = [];
                $arNum[] = substr($matches[2], 0, 5);
                $arNum[] = substr($matches[2], 5, 3);
                $arNum[] = substr($matches[2], 8, 1);
                $arNum[] = substr($matches[2], 9, 4);
                $arNum[] = substr($matches[2], 13, 7);

                return $matches[1] . implode('&thinsp;', $arNum) . $matches[3];
            },
            $text
        );
    }
}
