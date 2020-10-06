<?php

declare(strict_types=1);

namespace App\Model\Marketplace\UseCase\Partner\SignUp\Confirmation;

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
        $id = new Id($command->id);

        $partner = $this->partners->get($id);
        $partner->activate();

        $this->flusher->flush();
    }
}