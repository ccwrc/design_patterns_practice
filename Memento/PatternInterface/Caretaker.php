<?php

declare(strict_types=1);

namespace Patterns\Memento\PatternInterface;

use Patterns\Memento\GirlMemento;

interface Caretaker
{
    /**
     * Save memento object to storage and return unique memento ID.
     */
    public function addMementoAndReturnId(GirlMemento $girlMemento): string;

    public function getMemento(string $mementoId): ?GirlMemento;
}
