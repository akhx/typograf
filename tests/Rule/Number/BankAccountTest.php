<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\Number\BankAccount;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class BankAccountTest extends TestCase
{
    public function testHandler(): void
    {
        $arTests = [
            [
                '11122333455556666666',
                '11122&thinsp;333&thinsp;4&thinsp;5555&thinsp;6666666',
            ],
            [
                '<p>11122333455556666666</p>',
                '<p>11122&thinsp;333&thinsp;4&thinsp;5555&thinsp;6666666</p>',
            ],
            [
                "100\n11122333455556666666",
                "100\n11122&thinsp;333&thinsp;4&thinsp;5555&thinsp;6666666",
            ],
            [
                '111223334555566666667',
                '111223334555566666667',
            ],
        ];

        foreach ($arTests as $arTest) {
            $test = (new BankAccount())->Handler($arTest[0]);
            $this->assertSame($test, $arTest[1]);
        }
    }
}
