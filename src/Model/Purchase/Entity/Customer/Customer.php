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
    const STATUS_WAIT = 'wait';

    /**
     * @ORM\Column(type="purchase_customer_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="purchase_customer_email", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", name="signup_token", length=255, nullable=true)
     */
    private $signUpToken;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;


    public static function createByEmail(Email $email, string $token)
    {
        $customer = new Customer(Id::next(), $email);
        $customer->status = self::STATUS_WAIT;
        $customer->signUpToken = $token;

        return $customer;
    }

    private function __construct(Id $id, Email $email, ?string $firstname = null, ?string $lastname = null)
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

    public function getStatus()
    {
        return $this->status;
    }
}