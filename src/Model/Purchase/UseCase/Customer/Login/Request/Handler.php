<?php

declare(strict_types=1);

namespace App\Model\Purchase\UseCase\Customer\Login\Request;

use App\Model\Purchase\Entity\Customer\CustomerRepository;
use App\Model\Flusher;
use App\Model\Purchase\Entity\Customer\Email;
use App\Model\Purchase\Entity\Customer\Customer;
use App\Model\Purchase\Service\SignupTokenGenerator;
use App\Model\SenderInterface;

class Handler
{
    private $customers;
    private $flusher;
    private $tokenGenerator;
    private $sender;

    public function __construct(
        CustomerRepository $customers,
        Flusher $flusher,
        SignupTokenGenerator $tokenGenerator,
        SenderInterface $sender
    )
    {
        $this->customers = $customers;
        $this->flusher = $flusher;
        $this->tokenGenerator = $tokenGenerator;
        $this->sender = $sender;
    }

    public function handle(Command $command)
    {
        $email = new Email($command->email);

        $customer = $this->customers->findByEmail($email);
        $token = $this->tokenGenerator->generate();

        if (!$customer) {
            $customer = Customer::createByEmail($email, $token);
        }

        $this->customers->add($customer);
        $this->flusher->flush();

        $this->sender->send($email, $token);

        return $customer;
    }
}