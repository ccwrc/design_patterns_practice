<?php

declare(strict_types=1);

namespace Patterns\Memento;

final class FastGirl extends Girl
{
    private int $maxSpeed;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->maxSpeed = 20;
    }

    public function saveToMemento(): GirlMemento
    {
        $state = [
            'name' => $this->name,
            'wolvesResistance' => $this->wolvesResistance,
            'abilityToLifeInForest' => $this->abilityToLifeInForest,
            'basket' => $this->basket,
            'hoodColor' => $this->hoodColor,
            'liveGrandmother' => $this->liveGrandmother,
            'revengeDesire' => $this->revengeDesire,
            'maxSpeed' => $this->maxSpeed
        ];
        $girlMemento = new GirlMemento();
        $girlMemento->saveState($state);

        return $girlMemento;
    }

    /**
     * @inheritDoc
     */
    public function restoreFromMemento(GirlMemento $girlMemento): void
    {
        $state = $girlMemento->getState();
        $this->name = $state['name'];
        $this->wolvesResistance = $state['wolvesResistance'];
        $this->abilityToLifeInForest = $state['abilityToLifeInForest'];
        $this->basket = $state['basket'];
        $this->hoodColor = $state['hoodColor'];
        $this->liveGrandmother = $state['liveGrandmother'];
        $this->revengeDesire = $state['revengeDesire'];
        $this->maxSpeed = $state['maxSpeed'];
    }

    public function setMaxSpeed(int $speed): void
    {
        $this->maxSpeed = $speed;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }
}
