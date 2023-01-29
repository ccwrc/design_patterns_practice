<?php

declare(strict_types=1);

namespace Patterns\Memento\PatternInterface;

use Patterns\Memento\GirlMemento;

interface Originator
{
    /**
     * Writes the state of the originator object to the memento object.
     */
    public function saveToMemento(): GirlMemento;

    /**
     * Restore the originator object based on the memento.
     */
    public function restoreFromMemento(GirlMemento $girlMemento): void;
}
