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
    ): array
    {
        $backtrace = debug_backtrace();

        return $backtrace[0]['args'];
    }
}
