<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features;

use Patterns\ExperimentalFolder\Php81features\Enums\{IceCreamColorEnum, IceCreamFlavorEnum, IceCreamTemperatureEnum};

/**
 * @link https://php.watch/versions/8.1/enums detailed description.
 */
readonly class IceCreamWithEnums
{
    public function __construct(
        private IceCreamFlavorEnum      $flavor,
        private IceCreamTemperatureEnum $temperature,
        private IceCreamColorEnum       $color
    )
    {
    }

    public function getFlavor(): string
    {
        return $this->flavor->value;
    }

    public function getTemperature(): int
    {
        return $this->temperature->value;
    }

    public function getColor(): string
    {
        return $this->color->name;
    }

    public function availableFlavors(): array
    {
        return $this->flavor->getFlavors();
    }
}
