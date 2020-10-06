<?php

namespace App\Model\Marketplace\UseCase\Partner\SignUp\Request;

use Symfony\Component\Validator\Constraints as Assert;

class Command
{
    /**
     * @Assert\NotBlank()
     * @var string $name
     */
    public $name;

    /**
     * @Assert\NotBlank()
     * @var string $company_name
     */
    public $company_name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @var string $email
     */
    public $email;

    public function __construct(string $name, string $company_name, string $email)
    {
        $this->name = $name;
        $this->company_name = $company_name;
        $this->email = $email;
    }
}