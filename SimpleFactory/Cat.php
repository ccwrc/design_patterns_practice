<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class Cat implements CatInterface
{
    private bool $fluffy;

    private bool $annoying;

    public function __construct(
        bool $isFluffy,
        bool $isAnnoying
    )
    {
        $this->fluffy = $isFluffy;
        $this->annoying = $isAnnoying;
    }

    /**
     * @inheritDoc
     */
    public function isFluffy(): bool
    {
        return $this->fluffy;
    }

    /**
     * @inheritDoc
     */
    public function isAnnoying(): bool
    {
        return $this->annoying;
    }

    /**
     * @inheritDoc
     */
    public function getVoice(): string
    {
        if ($this->annoying) {
            return 'Go fuck yourself men!';
        }

        return 'meow, meow';
    }
}
