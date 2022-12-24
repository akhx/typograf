<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\BeforeBracket;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class BeforeBracketTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new BeforeBracket();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
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
    }
}
