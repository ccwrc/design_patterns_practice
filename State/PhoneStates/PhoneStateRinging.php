<?php

declare(strict_types=1);

namespace Patterns\State\PhoneStates;

use Patterns\State\PhoneState;

class PhoneStateRinging extends PhoneState
{
    /**
     * @inheritDoc
     */
    public function isLineBusy(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function stateAfterShortPressRedButton(): PhoneState
    {
        return PhoneStateIdle::create();
    }
}
