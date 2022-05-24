<?php

namespace Akh\Typograf\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;

class Ordinal extends AbstractRule
{
    public $name = 'Исправление падежного окночания у чисел';

    public function handler(string $text): string
    {
        $map = [
            'ой' => 'й',
            'ый' => 'й',
            'ая' => 'я',
            'ое' => 'е',
            'ые' => 'е',
            'ым' => 'м',
            'ом' => 'м',
            'ых' => 'х',
            'ого' => 'го',
            'ому' => 'му',
            'ыми' => 'ми',
        ];

        return preg_replace_callback(
            '#(\d[%‰]?)-(' . implode('|', array_keys($map)) . ')(?![' . $this->char['char'] . '])#iu',
            function ($matches) use ($map) {
                return $matches[1] . '-' . $map[$matches[2]];
            },
            $text
        );
    }
}
