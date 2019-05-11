<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Receiver
 */
class Soldier implements SoldierArmyInterface
{
    /**
     * @var string
     */
    private $rank;
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $isDead;
    /**
     * @var int
     */
    private $calories;

    public function __construct(string $rank, string $name)
    {
        $this->rank = $rank;
        $this->name = $name;
        $this->isDead = false;
        $this->calories = 10;
    }

    public function dieForCountry(): void
    {
        $this->throwDomainExceptionIfSoldierIsDead();
        $this->calories = 0;
        $this->isDead = true;
    }

    public function shootForCountry(): void
    {
        $this->throwDomainExceptionIfSoldierIsDead();
        $this->calories -= 1;
        $this->checkCaloricBalance();
    }

    public function eatForGloryOfCountry(int $calories): void
    {
        $this->throwDomainExceptionIfSoldierIsDead();
        $this->calories += $calories;
        $this->checkCaloricBalance();
    }

    public function getCaloriesInfo(): int
    {
        return $this->calories;
    }

    public function isSoldierLive(): bool
    {
        return !$this->isDead;
    }

    private function throwDomainExceptionIfSoldierIsDead(): void
    {
        if ($this->isDead) {
            throw new \DomainException('Soldier is dead');
        }
    }

    private function checkCaloricBalance(): void
    {
        if ($this->calories <= 0) {
            $this->isDead = true;
        }
    }
}
