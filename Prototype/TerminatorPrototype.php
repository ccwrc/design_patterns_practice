<?php

declare(strict_types=1);

namespace Patterns\Prototype;

use Ramsey\Uuid\Uuid;

abstract class TerminatorPrototype implements Location
{
    protected int $location;

    protected ?Uuid $serialNumber = null;

    protected int $randomValue;

    public function __construct(int $locationOfTeleportation)
    {
        $this->location = $locationOfTeleportation;
        $this->randomValue = \rand(1,100);
    }

    abstract public function __clone();

    abstract public function tryKillSarah(Sarah $sarah): bool;

    public function setSerialNumber(): bool
    {
        try {
            $this->serialNumber = Uuid::uuid5();

            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    public function getSerialNumber(): ?Uuid
    {
        return $this->serialNumber;
    }
}
