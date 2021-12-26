<?php

declare(strict_types=1);

namespace Patterns\NullObject;

class FakeMailer implements MailerStrategy
{
    /**
     * @inheritDoc
     */
    public function sendMail(string $mailAddress): void
    {
        // do nothing (...watch tv series)
    }
}
