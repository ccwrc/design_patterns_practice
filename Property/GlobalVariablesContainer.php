<?php

declare(strict_types=1);

namespace Patterns\Property;

final class GlobalVariablesContainer implements PropertyContainer
{
    private static array $container = [];

    /**
     * GlobalVariablesContainer constructor.
     * Class instance is not required and not desirable
     */
    private function __construct()
    {
    }

    /**
     * @inheritDoc
     */
    public static function addPropertyBy(string $name, $property): void
    {
        self::$container[$name] = $property;
    }

    /**
     * @inheritDoc
     */
    public static function getPropertyBy(string $name)
    {
        return self::$container[$name] ?? null;
    }

    /**
     * @inheritDoc
     */
    public static function removePropertyBy(string $name): void
    {
        if(self::isPropertyExist($name)) {
            unset(self::$container[$name]);
        }
    }

    /**
     * @inheritDoc
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
     * @inheritDoc
     */
    public static function isPropertyExist(string $name): bool
    {
        return isset(self::$container[$name]);
    }
}
