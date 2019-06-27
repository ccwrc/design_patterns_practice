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
     * @var string[]
     */
    private $intDividedIntoBits;

    /**
     * NumberPerBit constructor.
     * @param int $number
     * @throws \Exception
     */
    public function __construct(int $number)
    {
        if (\abs($number) > self::MAX_32_BIT_INT) {
            throw new \Exception('Number too big');
        }

        $this->originalInt = $number;
        $this->intDividedIntoBits = self::convertTo32length($number);
        // TODO index[0] negative/positive value?
    }

    /**
     * @param int $number (negative values will be converted into positive values)
     * @return string[]
     */
    private static function convertTo32length(int $number): array
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
        return isset($this->intDividedIntoBits[$offset]) ? $this->intDividedIntoBits[$offset] : null;
    }

    /**
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
        if (\is_null($offset)) {
            // or do nothing
            $this->intDividedIntoBits[] = $value;
        } else {
            $this->intDividedIntoBits[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->intDividedIntoBits[$offset]);
    }
}
