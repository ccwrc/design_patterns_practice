<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

/**
 * @link https://php.watch/articles/PHP-8.2#type-safety description
 */
class ReturnTypes
{
    public static function getTrue(): true
    {
        return true;
    }

    public static function getFalse(): false
    {
        return false;
    }

    public static function getNull(): null
    {
        return null;
    }
}
