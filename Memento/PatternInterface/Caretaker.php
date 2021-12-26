<?php

declare(strict_types=1);

namespace Patterns\Memento\PatternInterface;

use Patterns\Memento\GirlMemento;

interface Caretaker
{
    /**
     * Save memento object to storage and return unique memento ID.
     *
     * @param GirlMemento $girlMemento
     *
     * @return string
     */
    public function addMementoAndReturnId(GirlMemento $girlMemento): string;

    /**
     * @param string $mementoId
     *
     * @return null|GirlMemento
     */
    public function getMemento(string $mementoId): ?GirlMemento;
}
