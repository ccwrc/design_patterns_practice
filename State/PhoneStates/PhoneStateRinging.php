<?php

declare(strict_types=1);

namespace Patterns\State\PhoneStates;

use Patterns\State\PhoneState;

class PhoneStateRinging extends PhoneState
{
    public function isLineBusy(): bool
    {
        return true;
    }

    public function stateAfterShortPressRedButton(): PhoneState
    {
        return PhoneStateIdle::create();
    }
}
