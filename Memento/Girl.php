<?php

declare(strict_types=1);

namespace Patterns\Memento;


class Girl
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

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->wolvesResistance = false;
        $this->abilityToLifeInForest = true;
        $this->basket = false;
        $this->hoodColor = 'red';
    }

    /**
     * @param Deadly $killer
     */
    public function killGrandma(Deadly $killer): void
    {
        if ($killer->doesHaveWeapon()) {
            $this->liveGrandmother = false;
        }
    }
}
