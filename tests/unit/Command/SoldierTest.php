<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\Soldier;

use PHPUnit\Framework\TestCase;

class SoldierTest extends TestCase
{
    public function testThrowException(): void
    {
        $soldier = new Soldier('Private', 'universal soldier');
        $poisonedFood = -($soldier->getCaloriesInfo() + 1);
        $soldier->eatForGloryOfCountry($poisonedFood);

        $this->expectException(\DomainException::class);
        $soldier->shootForCountry();
    }
}
