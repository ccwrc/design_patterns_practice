<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Php81features\Enums;

enum IceCreamTasteEnum: string
{
    case StandardTaste = 'plain vanilla';
    case BestTaste = 'pistachio fury';
    case FunnyTaste = 'fancy banana';
    case DangerousTaste = '9mm Beretta barrel in your mouth';
}
