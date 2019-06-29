<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder;

use Patterns\ExperimentalFolder\NumberPerBit;

use PHPUnit\Framework\TestCase;

class NumberPerBitTest extends TestCase
{
    /**
     * @return NumberPerBit
     * @throws \Exception
     */
    public function testCreate(): NumberPerBit
    {
        $object = new NumberPerBit(7);

        $this->assertInstanceOf(NumberPerBit::class, $object);
        $this->assertSame('1', $object[30]);

        return $object;
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

    /**
     * @depends testCreate
     * @param NumberPerBit $number
     */
    public function testOffsetExists(NumberPerBit $number): void
    {
        for ($i = 0; $i <= 31; $i++) {
            $this->assertTrue(isset($number[$i]));
        }
        $this->assertFalse(isset($number[32]));
        $this->assertTrue(empty($number[66]));
    }

    /**
     * @depends testCreate
     * @param NumberPerBit $number
     */
    public function testOffsetGet(NumberPerBit $number): void
    {
        for ($i = 0; $i <= 31; $i++) {
            $this->assertTrue(is_string($number[$i]));
        }
        $this->assertTrue(is_null($number[56]));
        $this->assertTrue(is_null($number[32]));
    }

    /**
     * @depends testCreate
     * @param NumberPerBit $number
     */
    public function testOffsetSet(NumberPerBit $number): void
    {
        $number[0] = '0';
        $this->assertEquals('0', $number[0]);
        $number[0] = '1';
        $this->assertEquals('1', $number[0]);
        $number[0] = 'o';
        $this->assertEquals('1', $number[0]);
        $number[0] = 1;
        $this->assertEquals('1', $number[0]);

        $number[32] = '0';
        $this->assertNull($number[32]);
        $number['R'] = '1';
        $this->assertNull($number['R']);
    }

    /**
     * @depends testCreate
     * @param NumberPerBit $number
     */
    public function testOffsetUnset(NumberPerBit $number): void
    {
        $number[31] = '1';
        unset($number[31]);
        $this->assertEquals('1', $number[31]);
    }
}
