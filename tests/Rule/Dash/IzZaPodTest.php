<?php

namespace Rule\Dash;

use akh\Typograf\Rule\Dash\IzZaPod;
use PHPUnit\Framework\TestCase;

class IzZaPodTest extends TestCase
{

    public function testHandler()
    {
        $arTests = [
            [' из под печки', ' из-под печки'],
            [' Из под&nbsp;печки', ' Из-под печки'],
            ['Из за лесу', 'Из-за лесу'],
            ['  Из за лесу', '  Из-за лесу'],
            ['из за гор', 'из-за гор'],
            ['  из за&nbsp;гор', '  из-за гор']
        ];

        foreach ($arTests as $arTest) {
            $test = (new IzZaPod())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
