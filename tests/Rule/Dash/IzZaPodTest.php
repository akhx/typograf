<?php

namespace Akh\Typograf\Tests\Rule\Dash;

use Akh\Typograf\Rule\Dash\IzZaPod;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class IzZaPodTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
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
        ];

        foreach ($arTests as $arTest) {
            $test = (new IzZaPod())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
