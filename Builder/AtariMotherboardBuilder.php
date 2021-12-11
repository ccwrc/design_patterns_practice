<?php

declare(strict_types=1);

namespace Patterns\Builder;

class AtariMotherboardBuilder implements MotherboardBuilder
{
    private string $pcb;
    private string $lan;
    private string $audioCard;

    public function createPcb(): void
    {
        $this->pcb = 'Atari PCB';
    }

    public function addLan(): void
    {
        $this->lan = 'Intel LAN';
    }

    public function addAudioCard(): void
    {
        $this->audioCard = 'Realtek audio';
    }

    /**
     * @link https://stackoverflow.com/questions/39068983/php-7-interfaces-return-type-hinting-and-self
     * @return MotherboardBuilder
     */
    public function getMotherboard(): MotherboardBuilder
    {
        return $this;
    }
}
