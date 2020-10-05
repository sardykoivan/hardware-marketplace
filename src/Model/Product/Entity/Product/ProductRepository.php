<?php

declare(strict_types=1);

namespace App\Model\Product\Entity\Product;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ProductRepository
{
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(Product::class);
    }

    public function getAll()
    {
        return $this->repo->findAll();
    }

    public function add(Product $product)
    {
        $this->em->persist($product);
    }
}