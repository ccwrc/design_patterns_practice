<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php00features;

class MatchVsSwitchVsIf
{
    public const RESULT_STRICT = 'I am a strict comparison.';
    public const RESULT_LOOSE = 'I am a loose comparison.';

    private const INT_ZERO = 0;

    /**
     * Strict comparison.
     * From docs: "Unlike switch, the comparison is an identity check (===) rather than a weak equality check (==)."
     *
     * @link https://www.php.net/manual/en/control-structures.match.php docs.
     */
    public static function funWitchMatch(): string
    {
        return match (self::INT_ZERO) {
            true, false => self::RESULT_LOOSE,
            default => self::RESULT_STRICT,
        };
    }

    /**
     * Loose comparison.
     */
    public static function funWitchSwitch(): string
    {
        switch (self::INT_ZERO) {
            case true:
            case false:
                return self::RESULT_LOOSE;
                break;
            default:
                return self::RESULT_STRICT;
        }
    }

    /**
     * Strict comparison.
     */
    public static function funWitchIf(): string
    {
        if (false === self::INT_ZERO) {
            return self::RESULT_LOOSE;
        }

        if (true === self::INT_ZERO) {
            return self::RESULT_LOOSE;
        }

        return self::RESULT_STRICT;
    }
}
