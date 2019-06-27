<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

/**
 * Class allows access (read and write) to one of 32 bits, for the number of int type passed in the constructor.
 */
final class NumberPerBit implements \ArrayAccess
{
    /**
     * @var int
     */
    private $originalInt;
    /**
     * @var string[]
     */
    private $intDividedIntoBits;

    public function __construct(int $number)
    {
        $this->originalInt = $number;
        // or add bits '0' to full 32-bit length
        $this->intDividedIntoBits = \str_split(\decbin($number), 1);

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
        if (is_null($offset)) {
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
