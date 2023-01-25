<?php

declare(strict_types=1);

namespace Patterns\tests\unit\LazyLoading;

use Patterns\LazyLoading\GetMudService;
use PHPUnit\Framework\TestCase;

class GetMudServiceTest extends TestCase
{
    public function testGetMud(): void
    {
        $service = new GetMudService();

        $this->assertEquals($service::DEFAULT_MUD_VALUE, $service->get());
    }

    public function testGetMoreMud(): void
    {
        $service = new GetMudService();

        $this->assertGreaterThan($service::DEFAULT_MUD_VALUE, $service->get(true));
    }
}
