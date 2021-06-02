<?php

namespace Rule\Punctuation;

use Akh\Typograf\Rule\Punctuation\ANo;
use PHPUnit\Framework\TestCase;

class ANoTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                'Его лодка скользнула вниз но бедняга держался по-прежнему стойко.',
                'Его лодка скользнула вниз, но бедняга держался по-прежнему стойко.'
            ],
            [
                'Я пошёл домой а он остался.',
                'Я пошёл домой, а он остался.'
            ],
            [
                'Я пошёл домой&nbsp;а он остался.',
                'Я пошёл домой,&nbsp;а он остался.'
            ],
            [
                '- Начну делать это сейчас, - сказал он, - а когда ты вернёшься, мы продолжим вместе.',
                '- Начну делать это сейчас, - сказал он, - а когда ты вернёшься, мы продолжим вместе.'
            ],
            [
                "Отечество мое в прошедшем \n	никак не может устояться –\nему раздваиваться между, \n	а тем и этим оставаться.\nЕго изогнутые сосны \n	хранят тревожные преданья,\nно откровения несносны,\n	невыносимы оправданья.",
                "Отечество мое в прошедшем \n	никак не может устояться –\nему раздваиваться между, \n	а тем и этим оставаться.\nЕго изогнутые сосны \n	хранят тревожные преданья,\nно откровения несносны,\n	невыносимы оправданья."
            ],
            [
                'Михаэль Шарналь попросил читателей в Твиттере поделиться полезными CSS-снипетами https://twitter.com/justmarkup/status/974573989497593856, а потом собрал их с пояснениями у себя в блоге — https://justmarkup.com/log/2018/03/collection-of-css-snippets/',
                'Михаэль Шарналь попросил читателей в Твиттере поделиться полезными CSS-снипетами https://twitter.com/justmarkup/status/974573989497593856, а потом собрал их с пояснениями у себя в блоге — https://justmarkup.com/log/2018/03/collection-of-css-snippets/'
            ],
            [
                'никто не отнимет то, что у тебя в голове ( а там может быть умиротворение и счастье)',
                'никто не отнимет то, что у тебя в голове ( а там может быть умиротворение и счастье)',
            ]
        ];

        foreach ($arTests as $arTest) {
            $test = (new ANo())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
