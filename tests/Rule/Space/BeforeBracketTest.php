<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\Space\BeforeBracket;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class BeforeBracketTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                'На половине перегона лес кончился, и с(боков) открылись елани(поля)...(Л. Толстой).',
                'На половине перегона лес кончился, и с (боков) открылись елани (поля)... (Л. Толстой).',
            ],
            [
                'Души неопытной волненья смирив со временем(как знать?), по сердцу я нашла бы друга(Пушкин).',
                'Души неопытной волненья смирив со временем (как знать?), по сердцу я нашла бы друга (Пушкин).',
            ],
            [
                'Но целью взоров и суждений в то время жирный был пирог(к несчастию, пересоленный)(Пушкин).',
                'Но целью взоров и суждений в то время жирный был пирог (к несчастию, пересоленный) (Пушкин).',
            ],
            [
                '2*(3+100)/13',
                '2*(3+100)/13',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new BeforeBracket())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
