<?php

declare(strict_types=1);

namespace Patterns\Memento;

class GirlCaretaker
{
    /**
     * @var GirlMemento[]
     */
    private $mementos = [];

    public function addMemento(GirlMemento $memento): string
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
