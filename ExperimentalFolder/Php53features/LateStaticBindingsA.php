<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php53features;

/**
 * @link https://www.php.net/manual/en/language.oop5.late-static-bindings.php docs.
 */
class LateStaticBindingsA
{
    public static function getSelf(): LateStaticBindingsA
    {
        return new self();
    }

    public static function getStatic(): static
    {
        return new static();
    }
}
