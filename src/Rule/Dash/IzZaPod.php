<?php

namespace Akh\Typograf\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;

class IzZaPod extends AbstractRule
{
    public $name = 'Расстановка дефисов между из-за, из-под';

    public function handler(string $text): string
    {
        $pattern = '#(из)(\s|&nbsp;)-?(за|под)([' . $this->char['charEnd'] . ']|\s|&nbsp;)#iu';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return $matches[1] . '-' . $matches[3] . ('&nbsp;' === $matches[4] ? ' ' : $matches[4]);
            },
            $text
        );
    }
}
