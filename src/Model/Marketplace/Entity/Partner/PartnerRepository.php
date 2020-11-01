<?php

declare(strict_types=1);

namespace App\Model\Marketplace\Entity\Partner;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;

class PartnerRepository
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(Partner::class);
    }

    public function add(Partner $partner)
    {
        $this->em->persist($partner);
    }

    public function get(Id $id): Partner
    {
        /** @var Partner $partner */
        if (!$partner = $this->repo->find($id->getValue())) {
            throw new EntityNotFoundException('Partner is not found.');
        }
        return $partner;
    }

    public function hasByEmail(Email $email): bool
    {
        return $this->repo->createQueryBuilder('t')
                ->select('COUNT(t.id)')
                ->andWhere('t.email = :email')
                ->setParameter(':email', $email->getValue())
                ->getQuery()->getSingleScalarResult() > 0;
    }
}