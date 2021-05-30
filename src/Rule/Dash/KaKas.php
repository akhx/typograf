<?php

namespace akh\Typograf\Rule\Dash;

use akh\Typograf\Rule\AbstractRule;

class KaKas extends AbstractRule
{
    public $name = 'Расстановка дефисов с частицами ка, кась';

    public function handler($text)
    {
        $pattern = '#([a-яё]+)(\s|&nbsp;)(ка(сь)?)([' . $this->char['charEnd'] . ']|\s|&nbsp;|$)#iu';

        for ($i = 0; $i < 2; $i++) {
            $text = preg_replace_callback(
                $pattern,
                function ($matches) {
                    return $matches[1] . '-' . $matches[3] . ($matches[5] === '&nbsp;' ? ' ' : $matches[5]);
                },
                $text
            );
        }

        return $text;
    }
}