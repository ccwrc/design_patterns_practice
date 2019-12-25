<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

interface SendEmailInterface
{
    /**
     * @throws \Exception
     */
    public static function sendMail(string $subject, string $content, string $emailAddress): void;

    /**
     * @param string[] $emailAddresses You must provide at least one recipient email address.
     * @throws \Exception
     */
    public static function sendMailToManyPeopleBcc(string $subject, string $content, array $emailAddresses): void;
}
