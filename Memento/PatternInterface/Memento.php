<?php

declare(strict_types=1);

namespace Patterns\Memento\PatternInterface;

interface Memento
{
    /**
     * Returns the state of the object provided by originator
     */
    public function getState(): mixed;

    /**
     * Writes the state of the object provided by originator
     */
    public function saveState(mixed $state): void;
}
