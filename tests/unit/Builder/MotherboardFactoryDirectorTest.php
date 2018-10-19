<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Builder;

use Patterns\Builder\{AtariMotherboardBuilder, BiostarMotherboardBuilder, MotherboardFactoryDirector};

use PHPUnit\Framework\TestCase;

class MotherboardFactoryDirectorTest extends TestCase
{
    public function testCanAtariMotherboardBuildRightObject(): void
    {
        $atariMotherboardBuilder = new AtariMotherboardBuilder();
        $newMotherboard = (new MotherboardFactoryDirector())->build($atariMotherboardBuilder);

        $this->assertInstanceOf(AtariMotherboardBuilder::class, $newMotherboard);
    }

    public function testCanBiostarMotherboardBuildRightObject(): void
    {
        $biostarMotherboardBuilder = new BiostarMotherboardBuilder();
        $newMotherboard = (new MotherboardFactoryDirector())->build($biostarMotherboardBuilder);

        $this->assertInstanceOf(BiostarMotherboardBuilder::class, $newMotherboard);
    }
}
