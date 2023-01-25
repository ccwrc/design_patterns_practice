<?php

declare(strict_types=1);

namespace Patterns\tests\unit\State\PhoneStates;

use Patterns\State\PhoneStates\{PhoneStateIdle, PhoneStateTalk};
use PHPUnit\Framework\TestCase;

class PhoneStateTalkTest extends TestCase
{
    public function testStateAfterShortPressRedButton(): void
    {
        $state = PhoneStateTalk::create();
        $this->assertInstanceOf(PhoneStateTalk::class, $state);

        $newState = $state->stateAfterShortPressRedButton();
        $this->assertInstanceOf(PhoneStateIdle::class, $newState);
    }
}
