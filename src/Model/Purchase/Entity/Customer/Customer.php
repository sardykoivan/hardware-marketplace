<?php

declare(strict_types=1);

namespace App\Model\Purchase\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers",  uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"email"})
 * }))
 */
class Customer
{
    /**
     * @ORM\Column(type="purchase_customer_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="marketplace_partner_email", length=255)
     */
    private $email;


    private function __construct(Id $id, string $firstname, string $lastname, Email $email)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstname;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}