<?php

namespace Akh\Typograf\Tests\Rule\Number;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Number\BankAccount;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class BankAccountTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new BankAccount();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
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
    }
}
