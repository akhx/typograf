<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class Phone extends AbstractRule
{
    public $name = 'Форматирование номера телефона';

    public $active = false;

    public $settings = [
        'tpl' => '+$1&thinsp;$2&thinsp;$3&ndash;$4&ndash;$5',
    ];

    public function handler(string $text): string
    {
        return preg_replace_callback(
            '#(^|,| |>)(\+7[\d() -]{10,18})#mu',
            function ($matches) {
                $clear = preg_replace('#[^0-9]#mu', '', $matches[2]);
                if (11 === strlen($clear)) {
                    return $matches[1] . preg_replace(
                        '#^(7)([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})$#',
                        $this->settings['tpl'],
                        $clear
                    );
                }

                return $matches[1] . $matches[2];
            },
            $text
        );
    }
}
