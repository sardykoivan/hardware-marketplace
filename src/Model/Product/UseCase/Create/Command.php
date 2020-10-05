<?php

declare(strict_types=1);

namespace App\Model\Product\UseCase\Create;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @Assert\NotBlank()
     * @var string $name
     */
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}