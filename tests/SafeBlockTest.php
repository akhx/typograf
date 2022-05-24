<?php

namespace Akh\Typograf\Tests;

use Akh\Typograf\SafeBlock;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class SafeBlockTest extends TestCase
{
    public function testRemoveAllBlock(): void
    {
        $safe = new SafeBlock();
        $safe->removeAllBlock();
        $this->assertSame($safe->getBlocks(), []);
    }
}
