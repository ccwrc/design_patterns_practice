<?php

declare(strict_types=1);

namespace Patterns\State;

abstract class PhoneState
{
    abstract public function isLineBusy(): bool;

    public function getStateName(): string
    {
        return static::class;
    }

    public static function create(): PhoneState
    {
        return new static();
    }

    abstract public function stateAfterShortPressRedButton(): PhoneState;
}
