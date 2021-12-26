<?php

declare(strict_types=1);

namespace Patterns\Property;

interface PropertyContainer
{
    /**
     * @param string $name
     * @param mixed $property
     */
    public static function addPropertyBy(string $name, $property): void;

    /**
     * @link https://stackoverflow.com/questions/37033142/multiple-return-types-php-7 abut mixed
     * @link https://wiki.php.net/rfc/mixed-typehint mixed typehint
     *
     * @param string $name
     *
     * @return mixed
     */
    public static function getPropertyBy(string $name);

    /**
     * @param string $name
     */
    public static function removePropertyBy(string $name): void;

    /**
     * @return string
     */
    public static function getPropertyKeys(): string;

    /**
     * @param string $name
     *
     * @return bool
     */
    public static function isPropertyExist(string $name): bool;
}
