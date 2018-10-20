<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Observer;

use Patterns\Observer\{FakeManager, PlainSpyObserver};

use PHPUnit\Framework\TestCase;

class PlainSpyObserverTest extends TestCase
{
    public function testChangeWhenAddedSubjects(): void
    {
        $observer = new PlainSpyObserver();

        for ($i = 1; $i <= 20; $i++) {
            $fakeManager = new FakeManager();
            $fakeManager->attach($observer);
            $fakeManager->notify();
        }

        $this->assertCount(20, $observer->getSubjects());
    }
}
