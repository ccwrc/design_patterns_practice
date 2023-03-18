<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder;

use Patterns\ExperimentalFolder\Php74features\SerializeUnserialize;

/**
 * @link https://www.php.net/manual/en/language.oop5.magic.php offical docs.
 *
 * Function __autoload() has been DEPRECATED as of PHP 7.2.0. Use instead PSR-4 standard.
 * @link https://www.php-fig.org/psr/psr-4/ PSR-4.
 */
final class MagicMethod
{
    public const NAME_AFTER_DESERIALIZATION = 'new';
    public const INVOKE_MESSAGE = 'I am not a function, I am a class!';
    public const DESTRUCT_MESSAGE = 'I\'m going to heaven.';
    public const SET_STATE_MESSAGE = 'Is it working?';
    public const VAR_DUMP_MESSAGE = 'I\'m a dump';

    private static int $cloneCounter = 1;

    private ?int $cloneNumber;

    private bool $isClone;

    private string $name;

    private int $number;

    /**
     * MagicMethod constructor.
     *
     * @link https://kursphp.com/programowanie-obiektowe-php/konstruktor/ Multiple constructor & copy constructor.
     *
     * @param string $name
     * @param int $number
     */
    public function __construct(
        string $name,
        int $number
    )
    {
        $this->cloneNumber = null;
        $this->isClone = false;
        $this->name = $name;
        $this->number = $number;
    }

    public function isClone(): bool
    {
        return $this->isClone;
    }

    public function getCloneNumber(): ?int
    {
        return $this->cloneNumber;
    }

    /**
     * Method used to test magic method '__get'
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Method used to test magic methods '__sleep' & '__wakeup'
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Method is triggered when invoking inaccessible methods in an object context.
     *
     * @param string $name
     * @param array $arguments
     *
     * @throws \Exception
     */
    public function __call(string $name, array $arguments)
    {
        throw new \Exception('Method does not exist.');
    }

    /**
     * Method is triggered when invoking inaccessible methods in a static context.
     *
     * @param string $name
     * @param array $arguments
     *
     * @throws \Exception
     */
    public static function __callStatic(string $name, array $arguments)
    {
        throw new \Exception('Static method does not exist.');
    }

    /**
     * Method allows a class to decide how it will react when it is treated like a string.
     *
     * @link https://sekurak.pl/php-object-injection-malo-znana-krytyczna-klasa-podatnosci/ How to avoid problems.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * The destructor will be called even if script execution is stopped using exit(). Calling exit() in a destructor
     * will prevent the remaining shutdown routines from executing.
     *
     * @link https://www.owasp.org/index.php/PHP_Object_Injection How to avoid problems.
     */
    public function __destruct()
    {
        MicroLogger::addLog(self::DESTRUCT_MESSAGE);
        MicroLogger::addLog(__CLASS__ . ' ' . $this->name);
    }

    /**
     * Method is utilized for reading data from inaccessible (protected or private) or non-existing properties.
     *
     * Warning: magic is slower (than getters/setters).
     *
     * @param string $name
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get(string $name)
    {
        $methodName = "get{$name}";
        if (method_exists($this, $methodName)) {

            return $this->$methodName();
        }

        throw new \Exception('No access to property or property does not exist.');
        // (note) worse way: trigger_error('message', E_USER_NOTICE);
    }

    /**
     * Method is run when writing data to inaccessible (protected or private) or non-existing properties.
     *
     * @param string $name
     * @param mixed $value
     *
     * @throws \Exception
     */
    public function __set(string $name, $value): void
    {
        throw new \Exception('No access to property or property does not exist.');
        // (note) or logic: check name, check and filter value, fun with reflection, etc.
    }

    /**
     * Function serialize() checks if the class has a function with the magic name __sleep(). If so, that function is
     * executed prior to any serialization.
     *
     * Custom object serialization from PHP 7.4 @see SerializeUnserialize
     *
     * @link https://www.php.net/manual/en/language.oop5.magic.php#object.sleep docs.
     */
    public function __sleep(): array
    {
        return ['number'];
    }

    /**
     * Function unserialize() checks for the presence of a function with the magic name __wakeup(). If present, this
     * function can reconstruct any resources that the object may have.
     *
     * Custom object unserialize from PHP 7.4 @see SerializeUnserialize
     *
     * @link https://www.owasp.org/index.php/PHP_Object_Injection How to avoid problems.
     */
    public function __wakeup(): void
    {
        $this->name = self::NAME_AFTER_DESERIALIZATION;
    }

    /**
     * Method is called when a script tries to call an object as a function.
     */
    public function __invoke(): string
    {
        return self::INVOKE_MESSAGE;
    }

    /**
     * When the property does not exist or is protected/private, return false.
     *
     * @param $name
     *
     * @return bool
     */
    public function __isset($name): bool
    {
        return false;
    }

    /**
     * When the property does not exist or is protected/private, throw Exception.
     * The exception is thrown only for testing purposes.
     *
     * @param $name
     *
     * @throws \Exception
     */
    public function __unset($name): void
    {
        throw new \Exception($name . 'property does not exist or is protected/private.');
    }

    /**
     * Method is run for the clone, not the original object.
     */
    public function __clone()
    {
        $this->isClone = true;
        $this->cloneNumber = self::$cloneCounter;
        self::$cloneCounter++;
    }

    /**
     * This static method is called for classes exported by var_export(). The only parameter of this method is an
     * array containing exported properties in the form ['property' => value, ...].
     *
     * @link https://stackoverflow.com/questions/46441958/what-is-the-real-purpose-of-magic-method-set-state-in-php
     * Better than official docs.
     *
     * @link http://docs.php.net/manual/pl/function.var-export.php var_export() docs
     *
     * @param array $array
     *
     * @return MagicMethod
     */
    public static function __set_state(array $array): MagicMethod
    {
        return new MagicMethod(self::SET_STATE_MESSAGE, 17);
    }

    /**
     * Called by var_dump() or print_r().
     *
     * @return array
     */
    public function __debugInfo(): array
    {
        return [
            self::VAR_DUMP_MESSAGE => self::VAR_DUMP_MESSAGE
        ];
    }
}
