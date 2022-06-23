<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class BeforeParticle extends AbstractRule
{
    public $name = 'Нераз. пробел перед «ли», «ль», «же», «бы», «б»';

    public $sort = 510;

    public function handler(string $text): string
    {
        $particles = '(ли|ль|же|ж|бы|б)';
        $pattern = '#([' . $this->char['char'] . ']) ' . $particles . '([.,;:?!"‘“»]|\s|&nbsp;)#iu';

        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return $matches[1] . $this->char['nbsp'] . $matches[2] . ('&nbsp;' === $matches[3] ? ' ' : $matches[3]);
            },
            $text
        );
    }
}
