<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

/**
 * @link https://php.watch/versions/8.2/dnf-types info
 */
class DisjunctiveNormalForm
{
    public static function giveBack(AllowDynamicProperties|(ReadonlyClass&ReturnTypes&ConstantFromTrait)|null $objectOrNull):
    AllowDynamicProperties|(ReadonlyClass&ReturnTypes&ConstantFromTrait)|null
    {
        return $objectOrNull;
    }
}
