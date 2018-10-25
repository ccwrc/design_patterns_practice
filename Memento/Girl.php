<?php

declare(strict_types=1);

namespace Patterns\Memento;

use Patterns\Memento\PatternInterface\Originator;

class Girl implements Originator
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $wolvesResistance;
    /**
     * @var bool
     */
    private $abilityToLifeInForest;
    /**
     * @var bool
     */
    private $basket;
    /**
     * @var string
     */
    private $hoodColor;
    /**
     * @var bool
     */
    private $liveGrandmother;
    /**
     * @var bool
     */
    private $revengeDesire;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->wolvesResistance = false;
        $this->abilityToLifeInForest = true;
        $this->basket = false;
        $this->hoodColor = 'red';
        $this->liveGrandmother = true;
        $this->revengeDesire = false;
    }

    /**
     * @param Deadly $killer
     */
    public function killGrandma(Deadly $killer): void
    {
        if ($killer->doesHaveWeapon()) {
            $this->liveGrandmother = false;
            $this->revengeDesire = true;
        }
    }

    public function isGrandmaLives(): bool
    {
        return $this->liveGrandmother;
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
            'revengeDesire' => $this->revengeDesire
        ];
        $girlMemento = new GirlMemento();
        $girlMemento->setState($state);

        return $girlMemento;
    }

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
    }
}
