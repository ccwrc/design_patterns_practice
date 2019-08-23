<?php

declare(strict_types=1);

namespace Patterns\State;

/**
 * Context.
 * @link https://www.youtube.com/watch?v=Fe93CLbHjxQ Who do you gone call?
 */
class Phone
{
    /**
     * @var PhoneState
     */
    private $state;

    public function __construct(PhoneState $state)
    {
        $this->state = $state;
    }

    public function changeStateTo(PhoneState $state): void
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
}
