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
     * Warning: var $tooBigNumber in 32-bit system will be converted to float and will generate an error.
     *
     * @throws \Exception
     */
    public function testThrowExceptionIfIntTooBig(): void
    {
        $tooBigNumber = NumberPerBit::MAX_INT_FOR_32_BIT + 1;

        $this->expectException(\Exception::class);
        new NumberPerBit($tooBigNumber);
    }

    /**
     * @depends testCreate
     *
     * @param NumberPerBit $number
     */
    public function testOffsetExists(NumberPerBit $number): void
    {
        for ($i = 0; $i <= 31; $i++) {
            $this->assertTrue(isset($number[$i]));
        }
        $this->assertFalse(isset($number[32]));
        $this->assertEmpty($number[66]);
    }

    /**
     * @depends testCreate
     *
     * @param NumberPerBit $number
     */
    public function testOffsetGet(NumberPerBit $number): void
    {
        for ($i = 0; $i <= 31; $i++) {
            $this->assertIsString($number[$i]);
        }
        $this->assertNull($number[56]);
        $this->assertNull($number[32]);
    }

    /**
     * @depends testCreate
     *
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
     *
     * @param NumberPerBit $number
     */
    public function testOffsetUnset(NumberPerBit $number): void
    {
        $number[31] = '1';
        unset($number[31]);
        $this->assertEquals('1', $number[31]);
    }

    /**
     * @throws \Exception
     */
    public function testMaxAcceptableInt(): void
    {
        $maxInt = NumberPerBit::MAX_INT_FOR_32_BIT;
        $object = new NumberPerBit($maxInt);

        $counter = 0;
        foreach ($object->getStringBits() as $value) {
            if ('1' === $value) {
                $counter++;
            }
        }
        $this->assertEquals(32, $counter);
    }
}
