<?php

declare(strict_types=1);

namespace Patterns\State\PhoneStates;

use Patterns\State\PhoneState;

class PhoneStateIdle extends PhoneState
{
    /**
     * @inheritDoc
     */
    public function isLineBusy(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function stateAfterShortPressRedButton(): PhoneState
    {
        return self::create();
    }
}
