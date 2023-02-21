<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ExperimentalFolder\Php81features;

use JetBrains\PhpStorm\NoReturn;
use Patterns\ExperimentalFolder\Php81features\Enums\{IceCreamColorEnum, IceCreamFlavorEnum, IceCreamTemperatureEnum};
use Patterns\ExperimentalFolder\Php81features\IceCreamWithEnums;
use PHPUnit\Framework\TestCase;

class IceCreamWithEnumsTest extends TestCase
{
    #[NoReturn] public function testIsEnum(): void
    {
        $iceCream = new IceCreamWithEnums(
            IceCreamFlavorEnum::DangerousFlavor,
            IceCreamTemperatureEnum::MinTemperature,
            IceCreamColorEnum::Green
        );

        $this->assertStringContainsString('Enum', get_class($iceCream->availableFlavors()[0]));
    }

    public function testIsFlavorCorrect(): void
    {
        $this->assertFalse(IceCreamWithEnums::isFlavorCorrect('banana chicken - of course incorrect'));

        $this->assertTrue(IceCreamWithEnums::isFlavorCorrect(IceCreamFlavorEnum::DangerousFlavor->value));
    }
}
