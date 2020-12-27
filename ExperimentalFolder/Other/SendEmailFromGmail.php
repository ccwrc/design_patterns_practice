<?php

declare(strict_types=1);

namespace Patterns\ExperimentalFolder\Other;

use Patterns\ExperimentalFolder\EnvironmentVariables;

use PHPMailer\PHPMailer\{Exception, PHPMailer};

/**
 * @link https://myaccount.google.com/lesssecureapps Check if you have problems with gmail.
 */
final class SendEmailFromGmail implements SendEmailInterface
{
    /**
     * @param string $subject
     * @param string $content
     * @param string $emailAddress
     *
     * @throws Exception
     */
    public static function sendMail(
        string $subject,
        string $content,
        string $emailAddress
    ): void
    {
        $mailer = self::getConfiguredPhpMailer();
        $mailer->addAddress($emailAddress);
        $mailer->Subject = $subject;
        $mailer->Body = \htmlentities(\trim($content), ENT_QUOTES, "UTF-8");

        if (!$mailer->send()) {
            throw new Exception($mailer->ErrorInfo);
        }
    }

    /**
     * @param string $subject
     * @param string $content
     * @param string[] $emailAddresses
     *
     * @throws Exception
     */
    public static function sendMailToManyPeopleBcc(
        string $subject,
        string $content,
        array $emailAddresses
    ): void
    {
        if (empty($emailAddresses)) {
            return;
        }

        $mailer = self::getConfiguredPhpMailer();

        foreach ($emailAddresses as $email) {
            if (\filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mailer->addBCC($email);
            }
        }

        $mailer->Subject = $subject;
        $mailer->Body = \htmlentities(\trim($content), ENT_QUOTES, "UTF-8");

        if (!$mailer->send()) {
            throw new Exception($mailer->ErrorInfo);
        }
    }

    /**
     * @throws Exception
     */
    private static function getConfiguredPhpMailer(): PHPMailer
    {
        $gmailAddress = self::getGmailAddress();
        $gmailPassword = self::getGmailPassword();
        if (('' === $gmailPassword) || ('empty' === $gmailAddress)) {
            throw new Exception('Check if you have entered email and password.');
        }

        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = $gmailAddress;
        $mailer->Password = $gmailPassword;
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $mailer->CharSet = "UTF-8";
        $mailer->setFrom($gmailAddress);
        $mailer->addReplyTo($gmailAddress);

        return $mailer;
    }

    private static function getGmailAddress(): string
    {
        EnvironmentVariables::load();

        return $_ENV['GMAIL_ADDRESS'] ?? 'empty';
    }

    private static function getGmailPassword(): string
    {
        EnvironmentVariables::load();

        return $_ENV['GMAIL_PASSWORD'] ?? 'empty';
    }
}
