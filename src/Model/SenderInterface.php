<?php

declare(strict_types=1);

namespace App\Model;

interface SenderInterface
{
    //@TODO: переделать message на объект
    public function send(EmailInterface $email, string $message): bool;
}