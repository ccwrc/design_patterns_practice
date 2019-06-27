<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\NumberPerBit;

use PHPUnit\Framework\TestCase;

class NumberPerBitTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCreate(): void
    {
        $object = new NumberPerBit(7);

        $this->assertInstanceOf(NumberPerBit::class, $object);
        $this->assertSame('1', $object[30]);
    }

    /**
     * @throws \Exception
     */
    public function testThrowExceptionIfIntTooBig(): void
    {
        $tooBigNumber = NumberPerBit::MAX_32_BIT_INT + 1;

        $this->expectException(\Exception::class);
        new NumberPerBit($tooBigNumber);
    }
}
