<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php82features;

use Patterns\ExperimentalFolder\Php81features\ReadonlyProperty;

/**
 * @link https://php.watch/articles/PHP-8.2#readonly-classes
 */
final readonly class ReadonlyClass
{
    private bool $isUsed; /** @phpstan-ignore-line */

    /**
     * Another book from library for example. @see ReadonlyProperty
     */
    public function __construct(
        public string $title,
        public int    $numberOfPages
    )
    {
    }

    public function readBook(): self
    {
        return $this;
    }

    /**
     * Property $isUsed can only be set once.
     *
     * @param true $isUsed
     *
     * @return void
     */
    public function setIsUsed(true $isUsed): void
    {
        $this->isUsed = $isUsed; /** @phpstan-ignore-line */
    }

    public function itIsUsed(): bool
    {
        return $this->isUsed ?? false;
    }
}
