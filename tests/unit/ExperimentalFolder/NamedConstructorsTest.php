<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\NamedConstructors;
use PHPUnit\Framework\TestCase;

class NamedConstructorsTest extends TestCase
{
    public function testGetDangerousName(): void
    {
        $object = NamedConstructors::createWithDangerousName('Any');

        $this->assertSame(NamedConstructors::DANGEROUS_NAME, $object->getName());
    }
}
