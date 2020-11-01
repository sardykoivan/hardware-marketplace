<?php

declare(strict_types=1);

namespace App\Model\Marketplace\Entity\Partner;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="partners",  uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"email"})
 * }))
 */
class Partner
{
    const STATUS_WAIT = 'wait';
    const STATUS_ACTIVE = 'active';
    const STATUS_BANNED = 'banned';

    /**
     * @ORM\Column(type="marketplace_partner_id")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $company_name;

    /**
     * @ORM\Column(type="marketplace_partner_email", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $status;


    private function __construct(Id $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function signUpByEmail(Id $id, string $name, string $company_name, Email $email)
    {
        $partner = new self($id, $name);
        $partner->company_name = $company_name;
        $partner->email = $email->getValue();
        $partner->status = self::STATUS_WAIT;

        return $partner;
    }

    public function activate(): self
    {
        if ($this->isActive()) {
            throw new \DomainException('Partner is already active.');
        }

        $this->status = self::STATUS_ACTIVE;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}