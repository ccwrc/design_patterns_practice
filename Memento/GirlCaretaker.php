<?php

declare(strict_types=1);

namespace Patterns\Memento;

use Patterns\Memento\PatternInterface\Caretaker;

class GirlCaretaker implements Caretaker
{
    /**
     * @var GirlMemento[]
     */
    private array $mementos = [];

    /**
     * @inheritDoc
     */
    public function addMementoAndReturnId(GirlMemento $girlMemento): string
    {
        $hash = spl_object_hash($girlMemento);
        $this->mementos[$hash] = $girlMemento;

        return $hash;
    }

    public function getMemento(string $mementoId): ?GirlMemento
    {
        return $this->mementos[$mementoId] ?? null;
    }
}
