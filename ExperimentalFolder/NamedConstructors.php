<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

final class NamedConstructors
{
    public const string DANGEROUS_NAME = 'Arnold';
    public const string PLAIN_NAME = 'Joe';
    public const string DOG_NAME = 'Buddy';

    private function __construct(
        private readonly string $name,
        private readonly string $surname
    )
    {
    }

    public static function createWithDangerousName(string $surname): self
    {
        return new self(self::DANGEROUS_NAME, $surname);
    }

    public static function createWithPlainName(string $surname): self
    {
        return new self(self::PLAIN_NAME, $surname);
    }

    public static function createWithDogName(string $surname): self
    {
        return new self(self::DOG_NAME, $surname);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
}
