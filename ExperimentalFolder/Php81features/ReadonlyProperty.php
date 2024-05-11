<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features;

/**
 * @link https://php.watch/versions/8.1/readonly description
 * @link https://wiki.php.net/rfc/readonly_properties_v2 official docs
 */
final class ReadonlyProperty
{
    public const int DEFAULT_RENTAL_TIME = 14;

    public readonly string $title;
    public readonly int $numberOfPages;
    private readonly bool $isUsed; /** @phpstan-ignore-line */
    public int $rentalTime = self::DEFAULT_RENTAL_TIME;

    /**
     * Book from library for example.
     */
    public function __construct(
        string $title,
        int    $numberOfPages
    )
    {
        $this->title = $title;
        $this->numberOfPages = $numberOfPages;
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
        $this->isUsed = $isUsed;
    }

    public function itIsUsed(): bool
    {
        return $this->isUsed ?? false;
    }
}
