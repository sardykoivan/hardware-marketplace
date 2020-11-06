<?php

declare(strict_types=1);

namespace App\Model\Purchase\Entity\Customer;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

class CustomerRepository
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(Customer::class);
    }

    public function findByEmail(Email $email)
    {
        return $this->repo->findOneBy(['email' => $email->getValue()]);
    }

    public function add(Customer $customer)
    {
        $this->em->persist($customer);
    }
}
