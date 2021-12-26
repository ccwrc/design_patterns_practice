<?php

declare(strict_types=1);

namespace Patterns\Prototype;

use Ramsey\Uuid\Uuid;

abstract class TerminatorPrototype implements Location
{
    protected int $location;

    protected ?Uuid $serialNumber;

    protected int $randomValue;

    public function __construct(int $locationOfTeleportation)
    {
        $this->location = $locationOfTeleportation;
        $this->randomValue = \rand(1,100);
    }

    abstract public function __clone();

    /**
     * @param Sarah $sarah
     *
     * @return bool
     */
    abstract public function tryKillSarah(Sarah $sarah): bool;

    public function setSerialNumber(): bool
    {
        try {
            $this->serialNumber = Uuid::uuid4();

            return true;
        } catch (\Throwable $throwable) {
            return false;
        }
    }

    /**
     * @return null|Uuid
     */
    public function getSerialNumber(): ?Uuid
    {
        return $this->serialNumber;
    }
}
