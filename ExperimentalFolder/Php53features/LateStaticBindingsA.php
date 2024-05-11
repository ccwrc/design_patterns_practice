<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php53features;

/**
 * @link https://www.php.net/manual/en/language.oop5.late-static-bindings.php docs.
 */
class LateStaticBindingsA
{
    /**
     * @link https://phpstan.org/blog/solving-phpstan-error-unsafe-usage-of-new-static why constructor is final.
     */
    final public function __construct()
    {
    }

    public static function getSelf(): LateStaticBindingsA
    {
        return new self();
    }

    public static function getStatic(): static
    {
        return new static();
    }
}
