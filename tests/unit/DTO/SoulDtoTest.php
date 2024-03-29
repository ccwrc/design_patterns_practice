<?php

declare(strict_types=1);

namespace Patterns\tests\unit\DTO;

use Patterns\DTO\SoulDto;
use PHPUnit\Framework\TestCase;

class SoulDtoTest extends TestCase
{
    /**
     * @throws \JsonException
     */
    public function testSerialize(): void
    {
        $soulDto = new SoulDto(['Plain human soul.']);

        $json = json_encode($soulDto, JSON_THROW_ON_ERROR);

        $this->assertIsString($json);
    }

    public function testUnserialize(): void
    {
        $soulDto = new SoulDto(['Another, innocent, plain human soul.']);
        $serializedSoulDto = \serialize($soulDto);

        $this->expectExceptionMessage('There is no return from hell.');
        \unserialize($serializedSoulDto);
    }
}
