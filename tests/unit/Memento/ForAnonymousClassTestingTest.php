<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\ForAnonymousClassTesting;

use PHPUnit\Framework\TestCase;

class ForAnonymousClassTestingTest extends TestCase
{
    public function testAnonymousClass(): void
    {
        $anonymousClassObject = new class('plain name') extends ForAnonymousClassTesting {
            public function someFunction(): void
            {
                // Some function do nothing.
            }
        };

        $this->assertTrue($anonymousClassObject->returnTrue());
        $this->assertSame('plain name', $anonymousClassObject->getName());
    }
}
