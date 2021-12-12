<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/arrow_functions_v2 docs
 */
final class ArrowFunctionsTwoZero
{
    private const WORLD_STAMP = ' Been here. Tony Halik';

    private array $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function modifyArrayOldSyntax(): array
    {
        return \array_map(static function ($probablyLocationInString) {

            return \is_string($probablyLocationInString) ? $probablyLocationInString . self::WORLD_STAMP : self::WORLD_STAMP;
        }, $this->array);
    }

    public function modifyArrayNewSyntax(): array
    {
        return \array_map(static fn($location) => \is_string($location) ? $location . self::WORLD_STAMP : self::WORLD_STAMP, $this->array);
    }
}
