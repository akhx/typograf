<?php

namespace Akh\Typograf\Tests;

use Akh\Typograf\Typograf;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class DebugTest extends TestCase
{
    public function testGetAllInfo(): void
    {
        $typo = new Typograf(true);
        $typo->apply('10000');
        $debug = $typo->getDebug()->getAllInfo();
        $traceCount = is_array($debug['trace']) ? count($debug['trace']) : 0;
        $this->assertLessThan($traceCount, 20);
    }

    public function testGetModifyInfo(): void
    {
        $typo = new Typograf(true);
        $typo->apply('"a"');
        $debug = $typo->getDebug()->getModifyInfo();
        $traceCount = is_array($debug['trace']) ? count($debug['trace']) : 20;
        $this->assertGreaterThan($traceCount, 2);
    }
}
