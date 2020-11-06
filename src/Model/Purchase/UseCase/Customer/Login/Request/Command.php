<?php

declare(strict_types=1);

namespace App\Model\Purchase\UseCase\Customer\Login\Request;

class Command
{
    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}