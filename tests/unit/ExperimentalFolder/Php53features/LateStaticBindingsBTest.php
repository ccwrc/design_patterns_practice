<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php53features;

use Patterns\ExperimentalFolder\Php53features\{LateStaticBindingsA, LateStaticBindingsB};
use PHPUnit\Framework\TestCase;

class LateStaticBindingsBTest extends TestCase
{
    public function testGetSelf(): void
    {
        $this->assertInstanceOf(LateStaticBindingsA::class, LateStaticBindingsB::getSelf());
    }

    public function testGetStatic(): void
    {
        $this->assertInstanceOf(LateStaticBindingsB::class, LateStaticBindingsB::getStatic());
    }
}
