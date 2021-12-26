<?php

declare(strict_types=1);

namespace Patterns\Memento;

use Patterns\Memento\PatternInterface\Memento;

class GirlMemento implements Memento
{
    /**
     * @var mixed
     */
    private $state;

    /**
     * @inheritDoc
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @inheritDoc
     */
    public function saveState($state): void
    {
        $this->state = $state;
    }
}
