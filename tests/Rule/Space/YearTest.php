<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\Year;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class YearTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new Year();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                'В 2002году',
                'В 2002 году',
            ],
            [
                'Шёл 2010год.',
                'Шёл 2010 год.',
            ],
            [
                "на всём протяжении 1997года\n",
                "на всём протяжении 1997 года\n",
            ],
            [
                "\n\nНачавшиеся в 1957году экономические реформы были слишком поверхностными,",
                "\n\nНачавшиеся в 1957 году экономические реформы были слишком поверхностными,",
            ],
        ];
    }
}
