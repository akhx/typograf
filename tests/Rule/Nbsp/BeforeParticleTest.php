<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\Nbsp\BeforeParticle;
use PHPUnit\Framework\TestCase;

class BeforeParticleTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [
                "Может ли?",
                "Может&nbsp;ли?"
            ],
            [
                "Может ли?\nМожет ли?",
                "Может&nbsp;ли?\nМожет&nbsp;ли?"
            ],
            [
                "<p>Может ли?</p>",
                "<p>Может&nbsp;ли?</p>"
            ],
            ['Может ли&nbsp;быть?', 'Может&nbsp;ли быть?'],
            ['Может же быть?', 'Может&nbsp;же быть?']
        ];

        foreach ($arTests as $arTest) {
            $test = (new BeforeParticle())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
