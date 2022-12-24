<?php

namespace Akh\Typograf\Tests\Rule\Nbsp;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Nbsp\BeforeParticle;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class BeforeParticleTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new BeforeParticle();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'Может ли?',
                'Может&nbsp;ли?',
            ],
            [
                "Может ли?\nМожет ли?",
                "Может&nbsp;ли?\nМожет&nbsp;ли?",
            ],
            [
                '<p>Может ли?</p>',
                '<p>Может&nbsp;ли?</p>',
            ],
            ['Может ли&nbsp;быть?', 'Может&nbsp;ли быть?'],
            ['Может же быть?', 'Может&nbsp;же быть?'],
        ];
    }
}
