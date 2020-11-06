<?php

declare(strict_types=1);

namespace App\Model\Marketplace\Entity\Partner;

use Webmozart\Assert\Assert;

use App\Model\EmailInterface;

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