<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

interface SendEmailInterface
{
    /**
     * @param string $subject
     * @param string $content
     * @param string $emailAddress
     *
     * @throws \Exception
     */
    public static function sendMail(string $subject, string $content, string $emailAddress): void;

    /**
     * @param string $subject
     * @param string $content
     * @param string[] $emailAddresses
     *
     * @throws \Exception
     */
    public static function sendMailToManyPeopleBcc(string $subject, string $content, array $emailAddresses): void;
}
