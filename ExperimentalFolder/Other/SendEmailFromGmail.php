<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use Patterns\ExperimentalFolder\EnvironmentVariables;

use PHPMailer\PHPMailer\PHPMailer;

class SendEmailFromGmail
{
    public function sendMail(
        string $title,
        string $content,
        string $email
    )
    {
        $mailer = new PHPMailer(true);
    }

    public function sendMailToManyPeople(
        string $title,
        string $content,
        array $emails
    )
    {
        //
    }

    private static function getGmailAddress(): string
    {
        EnvironmentVariables::load();

        return $_ENV['GMAIL_ADDRESS'] ??= 'empty';
    }

    private static function getGmailPassword(): string
    {
        EnvironmentVariables::load();

        return $_ENV['GMAIL_PASSWORD'] ??= 'empty';
    }
}
