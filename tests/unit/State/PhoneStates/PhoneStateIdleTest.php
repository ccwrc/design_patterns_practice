<?php

declare(strict_types=1);

namespace Patterns\tests\unit\State\PhoneStates;

use Patterns\State\PhoneStates\PhoneStateIdle;
use PHPUnit\Framework\TestCase;

class PhoneStateIdleTest extends TestCase
{
    public function testCreate(): void
    {
        $state = PhoneStateIdle::create();

        $this->assertInstanceOf(PhoneStateIdle::class, $state);
    }

    public function testGetStateName(): void
    {
        $fullClassName = 'Patterns\State\PhoneStates\PhoneStateIdle';

        $this->assertEquals($fullClassName, PhoneStateIdle::create()->getStateName());
    }

    public function testIsLineBusy(): void
    {
        $state = PhoneStateIdle::create();

        $this->assertFalse($state->isLineBusy());
    }
}
