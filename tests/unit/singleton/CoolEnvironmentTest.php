<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CoolEnvironmentTest extends TestCase
{
    public function testGetInstance(): void
    {
        $env = CoolEnvironment::getInstance();
        $this->assertInstanceOf(CoolEnvironment::class, $env);
    }
}
