<?php

declare(strict_types=1);

namespace Patterns\NullObject;

class SomeService
{
    /**
     * @var MailerStrategy
     */
    private $mailer;

    public function __construct(MailerStrategy $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendSomeMail(string $mailAddress): ?string
    {
        return $this->mailer->sendMail($mailAddress);
    }
}
