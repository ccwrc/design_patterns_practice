<?php

declare(strict_types=1);

namespace Patterns\Builder;

class AtariMotherboardBuilder implements MotherboardBuilder
{
    private string $pcb; /** @phpstan-ignore-line */

    private string $lan; /** @phpstan-ignore-line */

    private string $audioCard; /** @phpstan-ignore-line */

    public function createPcb(): void
    {
        $this->pcb = 'Atari PCB';
    }

    public function addLan(): void
    {
        $this->lan = 'FujiNet';
    }

    public function addAudioCard(): void
    {
        $this->audioCard = 'Pokey';
    }

    /**
     * @link https://stackoverflow.com/questions/39068983/php-7-interfaces-return-type-hinting-and-self
     *
     * @return MotherboardBuilder
     */
    public function getMotherboard(): MotherboardBuilder
    {
        return $this;
    }
}
