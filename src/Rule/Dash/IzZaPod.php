<?php

namespace Akh\Typograf\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;

class IzZaPod extends AbstractRule
{
    public $name = 'Расстановка дефисов между из-за, из-под';

    public function handler(string $text): string
    {
        $pattern = '#(^|>|\s|&nbsp;)(из)(\s|&nbsp;)-?(за|под)([' . $this->char['charEnd'] . ']|\s|&nbsp;)#iu';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return $matches[1] . $matches[2] . '-' . $matches[4] . ('&nbsp;' === $matches[5] ? ' ' : $matches[5]);
            },
            $text
        );
    }
}
