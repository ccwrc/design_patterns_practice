<?php

declare(strict_types=1);

namespace Patterns\tests\unit\NullObject;

use Patterns\NullObject\{FakeMailer, RealMailer, SomeService};

use PHPUnit\Framework\TestCase;

class SomeServiceTest extends TestCase
{
    public function testFakeMailer(): void
    {
        $service = new SomeService(new FakeMailer());
        $this->assertInternalType('null', $service->sendSomeMail('fake@mail.dot'));
    }

    public function testRealMailer(): void
    {
        $service = new SomeService(new RealMailer());
        $this->assertInternalType('string', $service->sendSomeMail('fake@mail.dot'));
    }
}
