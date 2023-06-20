<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php81features;

use Patterns\ExperimentalFolder\Php81features\NeverReturnType;
use PHPUnit\Framework\TestCase;

class NeverReturnTypeTest extends TestCase
{
    public function testThrowException(): void
    {
        $this->expectException(\DomainException::class);
        NeverReturnType::throwException('Naści, piesku, kiełbasy! - mruknął - tylko się nią nie udław.');
    }
}
