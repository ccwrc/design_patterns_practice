<?php

declare(strict_types=1);

namespace Patterns\Memento;

use Patterns\Memento\PatternInterface\Memento;

class GirlMemento implements Memento
{
    private mixed $state;

    /**
     * @inheritDoc
     */
    public function getState(): mixed
    {
        return $this->state;
    }

    /**
     * @inheritDoc
     */
    public function saveState(mixed $state): void
    {
        $this->state = $state;
    }
}
