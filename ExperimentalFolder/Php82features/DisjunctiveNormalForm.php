<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php82features\Interfaces\{OtherInterface, SomeInterface};

/**
 * @link https://php.watch/versions/8.2/dnf-types info
 */
class DisjunctiveNormalForm
{
    public static function giveBack(AllowDynamicProperties|(SomeInterface&OtherInterface)|null $objectOrNull):
    AllowDynamicProperties|(SomeInterface&OtherInterface)|null
    {
        return $objectOrNull;
    }
}
