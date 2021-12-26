<?php

declare(strict_types=1);

namespace Patterns\State;

/**
 * Context.
 *
 * @link https://www.youtube.com/watch?v=Fe93CLbHjxQ Who do you gone call?
 */
class Phone
{
    private PhoneState $state;

    public function __construct(PhoneState $state)
    {
        $this->state = $state;
    }

    public function getStateName(): string
    {
        return $this->state->getStateName();
    }

    public function isBusy(): bool
    {
        return $this->state->isLineBusy();
    }

    public function shortPressRedButton(): void
    {
        $this->state = $this->state->stateAfterShortPressRedButton();
    }
}
