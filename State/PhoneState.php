<?php

declare(strict_types=1);

namespace Patterns\State;

abstract class PhoneState
{
    /**
     * @return bool
     */
    abstract public function isLineBusy(): bool;

    /**
     * @return string
     */
    public function getStateName(): string
    {
        return static::class;
    }

    /**
     * @return PhoneState
     */
    public static function create(): PhoneState
    {
        return new static();
    }

    /**
     * @return PhoneState
     */
    abstract public function stateAfterShortPressRedButton(): PhoneState;
}
