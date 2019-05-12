<?php

declare(strict_types=1);

namespace Patterns\tests\unit\Command;

use Patterns\Command\{CommandInvokerInterface, Officer};

use PHPUnit\Framework\TestCase;

class OfficerTest extends TestCase
{
    public function testCreate(): Officer
    {
        $officer = new Officer();

        $this->assertInstanceOf(CommandInvokerInterface::class, $officer);

        return $officer;
    }

    /**
     * @depends testCreate
     * @param Officer $officer
     * @throws \JsonException
     */
    public function testDoesJsonNowThrowExceptions(Officer $officer): void
    {
        $this->expectException(\JsonException::class);
        $officer->doesJsonNowThrowExceptions('invalidJson');
    }

    /**
     * @depends testCreate
     * @param Officer $officer
     * @throws \JsonException
     */
    public function testValidDoesJsonNowThrowExceptions(Officer $officer): void
    {
        $this->assertTrue($officer->doesJsonNowThrowExceptions('{ "valid" : "json" }'));
    }

    /**
     * @depends testCreate
     * @param Officer $officer
     */
    public function testShowArrayFirstKey(Officer $officer): void
    {
        $plainArray = ['plain', 111, 'array'];
        $this->assertEquals(0, $officer->showArrayFirstKey($plainArray)['key']);

        $associativeArray = ['one' => 111, 'two' => 888];
        $this->assertEquals('one', $officer->showArrayFirstKey($associativeArray)['key']);
    }
}
