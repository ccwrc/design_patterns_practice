<?php

declare(strict_types=1);

namespace Patterns\tests\unit\singleton;

use Patterns\singleton\CoolEnvironment;

use PHPUnit\Framework\TestCase;

class CoolEnvironmentTest extends TestCase
{
    public function testGetInstance(): void
    {
        $env = CoolEnvironment::getInstance();
        $this->assertInstanceOf(CoolEnvironment::class, $env);
    }

    public function testStaticBehavior(): void
    {
        $newMadnessLevel = 'low';

        $env = CoolEnvironment::getInstance();
        $env->setMadnessLevel($newMadnessLevel);
        unset($env);

        $env2 = CoolEnvironment::getInstance();
        $this->assertEquals($newMadnessLevel, $env2->getMadnessLevel());
    }

    public function testGetLanguage(): void
    {
        $env = CoolEnvironment::getInstance();
        $this->assertEquals('esperanto', $env->getLanguage());
    }
}
