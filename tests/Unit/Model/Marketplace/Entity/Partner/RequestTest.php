<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Marketplace\Entity\Partner;

use PHPUnit\Framework\TestCase;

use App\Model\Marketplace\Entity\Partner;


class RequestTest extends TestCase
{
    public function test()
    {
        $partner = Partner\Partner::signUpByEmail(
            $id = Partner\Id::next(),
            $name = 'Тестовый партнер';
            $email = new Partner\Email('test@app.test'),
            $hash = 'hash',
            $token = 'token'
        );

        self::assertTrue($user->isWait());
        self::assertFalse($user->isActive());

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getDate());
        self::assertEquals($name, $user->getName());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
        self::assertEquals($token, $user->getConfirmToken());

        self::assertTrue($user->getRole()->isUser());
    }
}
