<?php

//declare(strict_types=1);

namespace App\Model\Product\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products",  uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"name"})
 * }))
 */
class Product
{
    /**
     * @ORM\Column(type="product_product_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    public function __construct(Id $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

}


