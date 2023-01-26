<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\ConstantFromTrait;
use PHPUnit\Framework\TestCase;

class ConstantFromTraitTest extends TestCase
{
    public function testIsWaterPresent(): void
    {
        $this->assertTrue(ConstantFromTrait::isWaterPresent());
    }
}
