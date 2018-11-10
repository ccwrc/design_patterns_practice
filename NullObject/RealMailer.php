<?php

declare(strict_types=1);

namespace Patterns\NullObject;

class RealMailer implements MailerStrategy
{
    public function sendMail(string $mailAddress): string
    {
        return 'I\'m sending an email';
    }
}
