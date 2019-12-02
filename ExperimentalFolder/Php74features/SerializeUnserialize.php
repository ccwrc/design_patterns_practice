<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php74features;

/**
 * @link https://wiki.php.net/rfc/custom_object_serialization docs
 */
final class SerializeUnserialize
{
    public const WARNING_MESSAGE = 'It could be a zombie: ';

    public bool $isZombie;

    private string $name;

    public function __construct(string $name)
    {
        $this->isZombie = false;
        $this->name = $name;
    }

    public function __serialize(): array
    {
        return [
            'isZombie' => $this->isZombie,
            'name' => self::WARNING_MESSAGE . $this->name
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->isZombie = true;
        $this->name = $data['name'];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
