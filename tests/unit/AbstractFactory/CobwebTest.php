<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AbstractFactory;

use Patterns\AbstractFactory\Cobweb;
use PHPUnit\Framework\TestCase;

class CobwebTest extends TestCase
{
    public function testCreate(): void
    {
        $cobweb = new class(69) extends Cobweb
        {
        };

        $this->assertInstanceOf(Cobweb::class, $cobweb);
    }
}
