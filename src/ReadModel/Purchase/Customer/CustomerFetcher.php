<?php

declare(strict_types=1);

namespace App\ReadModel\Purchase\Customer;

use App\Model\Purchase\Entity\Customer\Customer;
use App\Model\Purchase\Entity\Customer\CustomerRepository;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use App\ReadModel\NotFoundException;
use App\Model\Purchase\Entity\Customer\Email;

class CustomerFetcher
{
    private $connection;
    private $customers;

    public function __construct(Connection $connection, CustomerRepository $customers)
    {
        $this->connection = $connection;
        $this->customers = $customers;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function findByEmail(string $email): Customer
    {
        return $this->customers->findByEmail( new Email($email) );
    }
}