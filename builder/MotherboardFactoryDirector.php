<?php

declare(strict_types=1);

namespace Patterns\builder;

class MotherboardFactoryDirector
{
    public function build(MotherboardBuilder $motherboardBuilder): MotherboardBuilder
    {
        $motherboardBuilder->createPcb();
        $motherboardBuilder->addLan();
        $motherboardBuilder->addAudioCard();

        return $motherboardBuilder->getMotherboard();
    }
}
