<?php

namespace Akh\Typograf\Tests\Rule;

use Akh\Typograf\Rule\AbstractRule;
use PHPUnit\Framework\TestCase;

abstract class RuleTestCase extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testHandler(string $inText, string $actual): void
    {
        $result = $this->getRule()->handler($inText);
        $this->assertSame($result, $actual);

        /**
         * double typo text
         */
        $result = $this->getRule()->handler($result);
        $this->assertSame($result, $actual);
    }

    /**
     * @return string[][]
     */
    abstract public function dataProvider(): array;

    abstract public function getRule(): AbstractRule;
}
