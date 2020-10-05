<?php

namespace App\Controller\Api;

use App\Model\Product\UseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Model\Product\Entity\Product\Product;

class ProductController extends AbstractController
{
    /**
     *
     * @Route("/api/products", methods={"GET","POST"})
     *
     * @param Request $request
     * @param UseCase\Create\Handler $handler
     *
     * @return JsonResponse
     */
    public function add(Request $request, UseCase\Create\Handler $handler)
    {
        $data = json_decode($request->getContent(), true);

        $command = new UseCase\Create\Command($data['name']);
        $handler->handle($command);

        return $this->json(['status' => true],200);
    }
}