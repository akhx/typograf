<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Dash\IzZaPod;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class IzZaPodTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new IzZaPod();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'из под печки',
                'из-под печки',
            ],
            [
                "из под печки\nиз под печки",
                "из-под печки\nиз-под печки",
            ],
            [
                '<p>из под печки</p>',
                '<p>из-под печки</p>',
            ],
            [' из под печки', ' из-под печки'],
            [' Из под&nbsp;печки', ' Из-под печки'],
            ['Из за лесу', 'Из-за лесу'],
            ['  Из за лесу', '  Из-за лесу'],
            ['из за гор', 'из-за гор'],
            ['  из за&nbsp;гор', '  из-за гор'],
            ['Карниз под покраску', 'Карниз под покраску'],
        ];
    }
}
