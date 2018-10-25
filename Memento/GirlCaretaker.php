<?php

declare(strict_types=1);

namespace Patterns\Memento;

use Patterns\Memento\PatternInterface\Caretaker;

class GirlCaretaker implements Caretaker
{
    /**
     * @var GirlMemento[]
     */
    private $mementos = [];

    public function addMementoAndReturnId(GirlMemento $memento): string
    {
        $hash = spl_object_hash($memento);
        $this->mementos[$hash] = $memento;

        return $hash;
    }

    public function getMemento(string $hash): ?GirlMemento
    {
        return $this->mementos[$hash] ?? null;
    }
}
