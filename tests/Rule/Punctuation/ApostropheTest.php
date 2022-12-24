<?php

namespace Akh\Typograf\Tests\Rule\Punctuation;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Punctuation\Apostrophe;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class ApostropheTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Apostrophe();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Жанна д\'Арк, О\'Коннор, д\'Артаньян',
                'Жанна д&rsquo;Арк, О&rsquo;Коннор, д&rsquo;Артаньян',
            ],
            [
                'c-moll\'ная увертюра, пользоваться E-mail\'ом',
                'c-moll&rsquo;ная увертюра, пользоваться E-mail&rsquo;ом',
            ],
            [
                'Кот-д\'Ивуар',
                'Кот-д&rsquo;Ивуар',
            ],
            [
                'Л\'Алькерия-д\'Аснар',
                'Л&rsquo;Алькерия-д&rsquo;Аснар',
            ],
            [
                'Не говорите плохо о Yoko, хотя бы из-за уважения к Lennon\'у',
                'Не говорите плохо о Yoko, хотя бы из-за уважения к Lennon&rsquo;у',
            ],
            [
                'О\'Коннор, О\'Хара, О\'Нил, О\'Хиггинс, О\'Куинн, О\'Кейси',
                'О&rsquo;Коннор, О&rsquo;Хара, О&rsquo;Нил, О&rsquo;Хиггинс, О&rsquo;Куинн, О&rsquo;Кейси',
            ],
            [
                'Yesterday I saw Jack\'s dog',
                'Yesterday I saw Jack&rsquo;s dog',
            ],
            [
                'tables\' legs',
                'tables\' legs',
            ],
        ];
    }
}
