<?php

declare(strict_types=1);

namespace Patterns\Property;

interface PropertyContainer
{
    public static function addPropertyBy(string $name, mixed $property): void;

    /**
     * @link https://stackoverflow.com/questions/37033142/multiple-return-types-php-7 abut mixed
     * @link https://wiki.php.net/rfc/mixed-typehint mixed typehint
     *
     * @return mixed
     */
    public static function getPropertyBy(string $name);

    public static function removePropertyBy(string $name): void;

    public static function getPropertyKeys(): string;

    public static function isPropertyExist(string $name): bool;
}
