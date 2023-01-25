<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Strategy\PoliceProcedures;

use Patterns\Strategy\PoliceProcedures\Carjacking;
use PHPUnit\Framework\TestCase;

class CarjackingTest extends TestCase
{
    public function testCreate(): Carjacking
    {
        $carjacking = new Carjacking();

        $this->assertInstanceOf(Carjacking::class, $carjacking);

        return $carjacking;
    }

    /**
     * @depends testCreate
     *
     * @param Carjacking $carjacking
     */
    public function testGetProcedure(Carjacking $carjacking): void
    {
        $this->assertSame('Turn on the siren and lights, pursue', $carjacking->getProcedure());
    }

    /**
     * @depends testCreate
     *
     * @param Carjacking $carjacking
     */
    public function testGetCode(Carjacking $carjacking): void
    {
        $this->assertSame('215', $carjacking->getCode());
    }
}
