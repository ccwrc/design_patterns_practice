<?php

declare(strict_types=1);

namespace Patterns\State\PhoneStates;

use Patterns\State\PhoneState;

class PhoneStateIdle extends PhoneState
{
    public function isLineBusy(): bool
    {
        return false;
    }

    public function stateAfterShortPressRedButton(): PhoneState
    {
        return self::create();
    }
}
