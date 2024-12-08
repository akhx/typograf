<?php

namespace Akh\Typograf\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;

class Address extends AbstractRule
{
    public $name = 'Неразрывной пробел а адресах г. ул. кв.';

    protected $sort = 450;

    public function handler(string $text): string
    {
        $pattern = [
            '#(^|\s|>)(обл|кр|ст|пос|с|д|ул|пер|пр|пр-т|просп|пл|бул|б-р|наб|ш|туп|оф|комн?|уч|вл|влад|стр|кор|г|эт|мкр|влд)\.\s+(\S)#iu',
            '#(^|\s|>)(дом|корпус|этаж)\s+(\S)#iu',
        ];

        $replace = [
            '$1$2.' . $this->char['nbsp'] . '$3',
            '$1$2' . $this->char['nbsp'] . '$3',
        ];

        return preg_replace($pattern, $replace, $text);
    }
}
