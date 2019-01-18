<?php

declare(strict_types=1);

namespace Patterns\Property;

final class GlobalVariablesContainer implements PropertyContainer
{
    /**
     * @var array
     */
    private static $container = [];

    /**
     * GlobalVariablesContainer constructor.
     * Class instance is not required and not desirable
     */
    private function __construct()
    {
    }

    /**
     * @param string $name
     * @param mixed $property
     */
    public static function addPropertyBy(string $name, $property): void
    {
        // TODO: Implement addPropertyBy() method.
    }

    /**
     * @param string $name
     * @link https://stackoverflow.com/questions/37033142/multiple-return-types-php-7 abut mixed
     * @link https://wiki.php.net/rfc/mixed-typehint mixed typehint
     * @return mixed
     */
    public static function getPropertyBy(string $name)
    {
        // TODO: Implement getPropertyBy() method.
    }

    /**
     * @param string $name
     */
    public static function removePropertyBy(string $name): void
    {
        // TODO: Implement removePropertyBy() method.
    }

    /**
     * @return string
     */
    public static function getPropertyKeys(): string
    {
        // TODO: Implement getPropertyKeys() method.
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function isPropertyExist(string $name): bool
    {
        // TODO: Implement isPropertyExist() method.
    }
}
