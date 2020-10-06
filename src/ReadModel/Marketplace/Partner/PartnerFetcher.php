<?php

declare(strict_types=1);

namespace App\ReadModel\Marketplace\Partner;

use App\Model\Marketplace\Entity\Partner\Partner;
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
        $this->partners = $em->getRepository(Partner::class);
        $this->em = $em;
    }

    /**
     * @param string $id
     * @return Partner
     */
    public function get(string $id): Partner
    {
        if (!$partner = $this->partners->find($id)) {
            throw new NotFoundException('Partner is not found');
        }

        return $partner;
    }
}