<?php


use Akh\Typograf\SafeBlock;
use PHPUnit\Framework\TestCase;

class SafeBlockTest extends TestCase
{

    public function testRemoveAllBlock()
    {
        $safe = new SafeBlock();
        $safe->removeAllBlock();
        $this->assertSame($safe->getBlocks(), []);
    }
}
