<?php

declare(strict_types=1);

namespace Patterns\Memento\PatternInterface;

interface Memento
{
    /**
     * Returns the state of the object provided by originator
     * @return mixed
     */
    public function getState();

    /**
     * Writes the state of the object provided by originator
     * @param mixed $state
     */
    public function saveState($state): void;
}
