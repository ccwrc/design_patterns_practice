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
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function saveState($state): void
    {
        $this->state = $state;
    }
}
