<?php

declare(strict_types=1);

namespace Patterns\tests\unit\State;

use Patterns\State\Phone;
use Patterns\State\PhoneStates\{PhoneStateIdle, PhoneStateRinging};

use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testCreate(): void
    {
        $phone = new Phone(PhoneStateIdle::create());

        $this->assertInstanceOf(Phone::class, $phone);
    }

    public function testIsBusy(): void
    {
        $phone = new Phone(PhoneStateRinging::create());

        $this->assertTrue($phone->isBusy());
    }

    public function testShortPressRedButton(): void
    {
        $phone = new Phone(PhoneStateRinging::create());
        $this->assertEquals(PhoneStateRinging::class, $phone->getStateName());

        $phone->shortPressRedButton();
        $this->assertEquals(PhoneStateIdle::class, $phone->getStateName());
    }
}
