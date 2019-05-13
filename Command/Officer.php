<?php

declare(strict_types=1);

namespace Patterns\Command;

/**
 * Invoker (pattern implementation)
 */
final class Officer implements CommandInvokerInterface
{
    /**
     * @var Command
     */
    private $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function run(): void
    {
        $this->command->execute();
    }

    /**
     * @link https://wiki.php.net/rfc/json_throw_on_error JsonException is available from PHP 7.3
     * @param string $jsonToDecode
     * @throws \JsonException
     * @return bool
     */
    public function doesJsonNowThrowExceptions(string $jsonToDecode): bool
    {
        \json_decode($jsonToDecode, false, 512, JSON_THROW_ON_ERROR);

        return false;
    }

    /**
     * Which key is the key to the military latrine.
     * @link https://wiki.php.net/rfc/array_key_first_last array_key_first() and array_key_last() implemented in PHP 7.3
     * @param array $array
     * @return array
     */
    public function showArrayFirstKey(array $array): array
    {
        $firstKey = array_key_first($array);

        return ['key' => $firstKey];
    }
}
