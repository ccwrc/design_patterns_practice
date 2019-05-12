<?php

declare(strict_types=1);

namespace Patterns\Command;

interface SoldierArmyInterface
{
    public function dieForCountry(): void;

    public function shootForCountry(): void;

    /**
     * Negative values for poisoned or out-of-date food.
     * @param int $calories
     */
    public function eatForGloryOfCountry(int $calories): void;
}