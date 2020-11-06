<?php


declare(strict_types=1);

namespace App\Model\Purchase\Service;

use Ramsey\Uuid\Uuid;

use App\Model\SenderInterface;

class SignupTokenGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}