<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Memento;

use Patterns\Memento\Wolf;
use PHPUnit\Framework\TestCase;

class WolfTest extends TestCase
{
    public function testSetDefaultWeapon(): void
    {
        $wolf = new Wolf('Zorg');
        $wolf->setDefaultWeapon('fangs and claws');

        $this->assertTrue($wolf->doesHaveWeapon());
    }
}
