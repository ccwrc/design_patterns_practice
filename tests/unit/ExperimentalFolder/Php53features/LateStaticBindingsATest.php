<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php53features;

use Patterns\ExperimentalFolder\Php53features\LateStaticBindingsA;
use PHPUnit\Framework\TestCase;

class LateStaticBindingsATest extends TestCase
{
    public function testGetSelf(): void
    {
        $this->assertInstanceOf(LateStaticBindingsA::class, LateStaticBindingsA::getSelf());
    }

    public function testGetStatic(): void
    {
        $this->assertInstanceOf(LateStaticBindingsA::class, LateStaticBindingsA::getStatic());
    }
}
