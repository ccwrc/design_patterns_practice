<?php

declare(strict_types=1);

namespace Patterns\Singleton;

final class CoolEnvironment
{
    static private $instance;
    private $parameters = [
        'language' => 'esperanto',
        'password' => 'doPasaCnoty',
        'madnessLevel' => 'mid'
    ];

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    static public function getInstance(): self
    {
        if(self::$instance === null) {
            self::$instance = new CoolEnvironment();
        }
        return self::$instance;
    }

    public function setMadnessLevel(string $newMadnessLevel): void
    {
        $this->parameters['madnessLevel'] = $newMadnessLevel;
    }

    public function getLanguage(): string
    {
        return $this->parameters['language'];
    }

    public function getPassword(): string
    {
        return $this->parameters['password'];
    }

    public function getMadnessLevel(): string
    {
        return $this->parameters['madnessLevel'];
    }
}
