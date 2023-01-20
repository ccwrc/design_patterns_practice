<?php

declare(strict_types=1);

namespace Patterns\tests\unit\CQS;

use Patterns\CQS\Soap;
use PHPUnit\Framework\TestCase;

class SoapTest extends TestCase
{
    public function testIsWetQuery(): void
    {
        $soap = new Soap();

        $this->assertFalse($soap->isWetQuery());
    }

    /**
     * @throws \Exception
     */
    public function testIsWetQueryAfterWashFeet(): void
    {
        $soap = new Soap();
        $soap->washSomethingCommand();

        $this->assertTrue($soap->isWetQuery());
    }
}
