<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Observer;

use Patterns\Observer\{FakeManager, KeyloggerObserver, PasswordManager};
use PHPUnit\Framework\TestCase;

class KeyloggerObserverTest extends TestCase
{
    public function testWithImplementationKeyloggerSubject(): void
    {
        $observer = new KeyloggerObserver();

        $passwordManager = new PasswordManager();
        $passwordManager->attach($observer);

        try {
            $passwordManager->createPasswordHash('plain pass');
            $passwordManager->createPasswordHash('another string');
        } catch (\Throwable $error) {
            echo $error->getMessage();
        }
        $this->assertSame(2, KeyloggerObserver::getCounterSubjectImplementsKeylogger());
        $this->assertSame(0, KeyloggerObserver::getCounterSubject());
    }

    public function testWithImplementationOnlySplSubject(): void
    {
        $observer = new KeyloggerObserver();

        $fakeManager = new FakeManager();
        $fakeManager->attach($observer);

        for ($i = 1; $i <= 35; $i++) {
            $fakeManager->notify();
        }

        $this->assertSame(35, KeyloggerObserver::getCounterSubject());
    }
}
