<?php

declare(strict_types=1);

namespace App\Model;

interface EmailInterface
{
    public function __construct(string $value);
    public function getValue(): string;
    public function isEqual(self $other): bool;
}