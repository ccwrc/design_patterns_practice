<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Observer;

use Patterns\Observer\FakeManager;
use PHPUnit\Framework\TestCase;

class FakeManagerTest extends TestCase
{
    public function testSpaceshipOperator(): void
    {
        $this->assertSame(1, FakeManager::spaceshipOperator(150, 5));
        $this->assertSame(0, FakeManager::spaceshipOperator(5, 5));
        $this->assertSame(-1, FakeManager::spaceshipOperator(5, 150));
    }
}
