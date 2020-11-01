<?php

declare(strict_types=1);

namespace App\ReadModel\Marketplace\Partner;

use App\Model\Marketplace\Entity\Partner\User;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use App\ReadModel\NotFoundException;

class PartnerFetcher
{
    private $connection;
    private $partners;
    private $em;
    
    public function __construct(Connection $connection, EntityManagerInterface $em)
    {
        $this->connection = $connection;
        $this->partners = $em->getRepository(User::class);
        $this->em = $em;
    }

    /**
     * @param string $id
     * @return User
     */
    public function get(string $id): User
    {
        if (!$partner = $this->partners->find($id)) {
            throw new NotFoundException('Customer is not found');
        }

        return $partner;
    }
}