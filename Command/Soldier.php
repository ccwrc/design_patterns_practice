<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Receiver (pattern implementation)
 */
final class Soldier implements SoldierArmyInterface
{
    private string $rank; /** @phpstan-ignore-line */

    private string $name; /** @phpstan-ignore-line */

    private bool $isDead;

    private int $calories;

    public function __construct(
        string $rank,
        string $name
    )
    {
        $this->rank = $rank;
        $this->name = $name;
        $this->isDead = false;
        $this->calories = self::INITIAL_CALORIES;
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
        --$this->calories;
        $this->checkCaloricBalanceAndMarkIfHeDied();
    }

    /**
     * @inheritDoc
     */
    public function eatForGloryOfCountry(int $calories): void
    {
        $this->throwDomainExceptionIfSoldierIsDead();
        $this->calories += $calories;
        $this->checkCaloricBalanceAndMarkIfHeDied();
    }

    public function getCaloriesInfo(): int
    {
        return $this->calories;
    }

    public function isLive(): bool
    {
        return !$this->isDead;
    }

    private function throwDomainExceptionIfSoldierIsDead(): void
    {
        if ($this->isDead) {
            throw new \DomainException('Soldier is dead');
        }
    }

    private function checkCaloricBalanceAndMarkIfHeDied(): void
    {
        if ($this->calories <= 0) {
            $this->isDead = true;
        }
    }
}
