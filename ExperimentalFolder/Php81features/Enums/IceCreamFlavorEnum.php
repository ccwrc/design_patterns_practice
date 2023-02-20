<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features\Enums;

enum IceCreamFlavorEnum: string implements IceCreamFlavorInterface
{
    case StandardFlavor = 'plain vanilla';
    case BestFlavor = 'pistachio fury';
    case FunnyFlavor = 'fancy banana';
    case DangerousFlavor = '9mm Beretta barrel in your mouth';

    public function getFlavors(): array
    {
        return self::cases();
    }
}
