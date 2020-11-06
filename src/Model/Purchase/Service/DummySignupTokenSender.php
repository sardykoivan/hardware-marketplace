<?php

declare(strict_types=1);

namespace App\Model\Purchase\Service;

use App\Model\SenderInterface;
use App\Model\EmailInterface;

class DummySignupTokenSender implements SenderInterface
{
    public function send(EmailInterface $email, string $message): bool
    {
        return true;
    }
}