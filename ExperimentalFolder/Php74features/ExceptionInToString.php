<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://www.php.net/manual/en/migration74.new-features.php#migration74.new-features.core.tostring-exceptions
 */
final class ExceptionInToString
{
    public const EXCEPTION_THROWING_STRING = 'Strong, independent woman without a cat.';

    private string $string;

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * @throws \Exception
     */
    public function __toString(): string
    {
        if (self::EXCEPTION_THROWING_STRING === $this->string) {
            throw new \Exception('Politically incorrect exception.');
        }

        return $this->string;
    }
}
