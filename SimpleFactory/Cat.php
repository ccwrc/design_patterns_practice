<?php

declare(strict_types=1);

namespace Patterns\SimpleFactory;

class Cat implements CatInterface
{
    public const CAT_VOICE = 'meow, meow';
    public const CAT_VOICE_ANNOYING = 'Go fuck yourself men!';

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

    public function isFluffy(): bool
    {
        return $this->fluffy;
    }

    public function isAnnoying(): bool
    {
        return $this->annoying;
    }

    public function getVoice(): string
    {
        if ($this->annoying) {
            return self::CAT_VOICE_ANNOYING;
        }

        return self::CAT_VOICE;
    }
}
