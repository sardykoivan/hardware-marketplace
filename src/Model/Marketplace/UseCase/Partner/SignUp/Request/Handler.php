<?php

declare(strict_types=1);

namespace App\Model\Marketplace\UseCase\Partner\SignUp\Request;

use App\Model\Flusher;
use App\Model\Marketplace\Entity\Partner\Email;
use App\Model\Marketplace\Entity\Partner\Partner;
use App\Model\Marketplace\Entity\Partner\PartnerRepository;
use App\Model\Marketplace\Entity\Partner\Id;

class Handler
{
    private $partners;
    private $flusher;

    public function __construct(PartnerRepository $partners, Flusher $flusher)
    {
        $this->partners = $partners;
        $this->flusher = $flusher;
    }

    public function handle(Command $command)
    {
        $email = new Email($command->email);

        if ($this->partners->hasByEmail($email)) {
            throw new \DomainException('User with this email already exists.');
        }

        $partner = Partner::signUpByEmail(
            Id::next(),
            $command->name,
            $command->company_name,
            $email
        );

        $this->partners->add($partner);
        $this->flusher->flush();
    }
}