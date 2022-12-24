<?php

namespace Akh\Typograf\Tests\Rule\Space;

use Akh\Typograf\Rule\AbstractRule;
use Akh\Typograf\Rule\Space\DelBeforePercent;
use Akh\Typograf\Tests\Rule\RuleTestCase;

/**
 * @internal
 */
class DelBeforePercentTest extends RuleTestCase
{
    public function getRule(): AbstractRule
    {
        return new DelBeforePercent();
    }

    /**
     * @return string[][]
     */
    public function dataProvider(): array
    {
        return [
            [
                '20 %',
                '20%',
            ],
            [
                '20 ‰',
                '20‰',
            ],
            [
                '20 ‱',
                '20‱',
            ],
            [
                'около 4&nbsp;%',
                'около 4%',
            ],
        ];
    }
}
