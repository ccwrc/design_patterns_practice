<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Class allows access (read and write) to one of 32 bits, for the number of int type passed in the constructor.
 */
final class NumberPerBit implements \ArrayAccess
{
    private const BITS_ARRAY_LENGTH = 32;
    public const MAX_32_BIT_INT = 2147483647;
    /**
     * @var int
     */
    private $originalInt;
    /**
     * bit indexes are arranged from index[0] = 2**31 to index[31] = 2**0 (order from the left)
     * @var string[]
     */
    private $intDividedIntoBits;

    /**
     * NumberPerBit constructor.
     * @param int $number (negative values will be converted into positive values)
     * @throws \Exception
     */
    public function __construct(int $number)
    {
        if (\abs($number) > self::MAX_32_BIT_INT) {
            throw new \Exception('Number too big');
        }

        $this->originalInt = $number;
        $this->intDividedIntoBits = self::convertTo32lengthStringsArray($number);
    }

    /**
     * @return string[]
     */
    public function getStringBits(): array
    {
        return $this->intDividedIntoBits;
    }

    public function getOriginalInt(): int
    {
        return $this->originalInt;
    }

    /**
     * bit indexes are arranged from index[0] = 2**31 to index[31] = 2**0 (order from the left)
     *
     * @param int $number (negative values will be converted into positive values)
     * @return string[]
     */
    private static function convertTo32lengthStringsArray(int $number): array
    {
        $number = \abs($number);
        $reverseBits = \array_reverse(\str_split(\decbin($number), 1));
        $reverseBitsSize = \count($reverseBits);

        for ($i = 1; $i <= (self::BITS_ARRAY_LENGTH - $reverseBitsSize); $i++) {
            $reverseBits[] = '0';
        }

        return \array_reverse($reverseBits);
    }

    /**
     * For the needs of the class: offset is fixed from 0 to 31.
     *
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset): bool
    {
        return isset($this->intDividedIntoBits[$offset]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->intDividedIntoBits[$offset] ?? null;
    }

    /**
     * For the needs of the class: offset is fixed from 0 to 31, the only parameters saved are strings '0' and '1'
     *
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value): void
    {
        if (!\is_int($offset)
            || $offset < 0
            || $offset > 31) {
            return;
        }

        if ('0' === $value || '1' === $value) {
            $this->intDividedIntoBits[$offset] = $value;
        }
    }

    /**
     * For the needs of the class: there is no way to reset the value.
     *
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset): void
    {
    }
}
