<?php

declare(strict_types=1);

namespace App\Model\Product\UseCase\Create;

use App\Model\Flusher;
use App\Model\Product\Entity\Product\Product;
use App\Model\Product\Entity\Product\Id;
use App\Model\Product\Entity\Product\ProductRepository;

class Handler
{
    private $products;
    private $flusher;

    public function __construct(ProductRepository $products, Flusher $flusher)
    {
        $this->products = $products;
        $this->flusher = $flusher;
    }

    public function handle(Command $command)
    {
        $id = Id::next();

        $product = new Product($id, $command->name);

        $this->products->add($product);

        $this->flusher->flush();
    }
}