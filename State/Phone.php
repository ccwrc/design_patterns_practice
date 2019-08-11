<?php

declare(strict_types=1);

namespace Patterns\State;

/**
 * Context.
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

    public function checkState(): PhoneState
    {
        return $this->state;
    }
}
