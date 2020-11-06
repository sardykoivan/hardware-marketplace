<?php

declare(strict_types=1);

namespace App\Model\Purchase\Entity\Customer;

use App\Model\EmailInterface;
use Webmozart\Assert\Assert;

class Email implements EmailInterface
{
    private $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Incorrect email.');
        }
        $this->value = mb_strtolower($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(EmailInterface $other): bool
    {
        return $this->getValue() === $other->getValue();
    }
}