<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features\Enums;

enum IceCreamTemperatureEnum: int
{
    case MaxTemperature = -14;
    case OptimalTemperature1 = -15;
    case OptimalTemperature2 = -16;
    case OptimalTemperature3 = -17;
    case MinTemperature = -18;
}
