<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

/**
 * @link https://php.watch/articles/PHP-8.2#sensitive-parameter info
 */
class SensitiveParameter
{
    public static function shamefulSecret(
        string                        $plainParameter,
        #[\SensitiveParameter] string $secretParameter
    ): true|string
    {
        return print_r(debug_backtrace(), true);
    }
}
