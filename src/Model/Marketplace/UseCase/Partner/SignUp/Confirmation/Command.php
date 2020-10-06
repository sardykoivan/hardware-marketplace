<?php

namespace App\Model\Marketplace\UseCase\Partner\SignUp\Confirmation;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @Assert\NotBlank()
     * @var string $name
     */
    public $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}