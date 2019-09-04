<?php

declare(strict_types=1);

namespace Patterns\Property;

final class GlobalVariablesContainer implements PropertyContainer
{
    /**
     * @var mixed[]
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
        self::$container[$name] = $property;
    }

    /**
     * @param string $name
     * @return mixed | null
     * @link https://wiki.php.net/rfc/mixed-typehint mixed typehint
     * @link https://stackoverflow.com/questions/37033142/multiple-return-types-php-7 abut mixed
     */
    public static function getPropertyBy(string $name)
    {
        return self::$container[$name] ?? null;
    }

    /**
     * @param string $name
     */
    public static function removePropertyBy(string $name): void
    {
        if(self::isPropertyExist($name)) {
            unset(self::$container[$name]);
        }
    }

    /**
     * @return string
     */
    public static function getPropertyKeys(): string
    {
        $keys = '';
        foreach (self::$container as $key => $property) {
            $keys .= $key . ' ';
        }
        return $keys;
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function isPropertyExist(string $name): bool
    {
        return isset(self::$container[$name]);
    }
}
