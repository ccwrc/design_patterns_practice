<?php

declare(strict_types=1);

namespace Patterns\NullObject;

readonly class SomeService
{
    public function __construct(private MailerStrategy $mailer)
    {
    }

    public function sendSomeMail(string $mailAddress): ?string
    {
        return $this->mailer->sendMail($mailAddress);
    }
}
