<?php

namespace Akh\Typograf\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;

class DelDouble extends AbstractRule
{
    public $name = 'Лишние знаки препинания';

    protected $settings = [
        'maxLenMark' => 3,
    ];

    public function handler(string $text): string
    {
        $pattern = [
            '#(,){2,}#iu',
            '#(:){2,}#iu',
            '#(&\w+;;);+|((^|\s)(\w+;));+#iu',
            '#(\.){4,}#iu',
            '#(!){' . ($this->settings['maxLenMark'] + 1) . ',}#iu',
            '#(\?){' . ($this->settings['maxLenMark'] + 1) . ',}#iu',
            '#(^|[^!])!{2}($|[^!])#iu',
            '#(^|[^?])\?{2}($|[^?])#iu',
        ];

        $replace = [
            '$1',
            '$1',
            '$1$2',
            '$1$1$1',
            str_repeat('$1', $this->settings['maxLenMark']),
            str_repeat('$1', $this->settings['maxLenMark']),
            '$1!$2',
            '$1?$2',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
