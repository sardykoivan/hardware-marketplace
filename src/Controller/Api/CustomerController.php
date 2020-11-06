<?php

namespace App\Controller\Api;

use App\ReadModel\Purchase\Customer\CustomerFetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Model\Purchase\UseCase\Customer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractController
{
    /**
     * @Route("/api/customers/signup/request", methods={"POST"})
     *
     * @param Request $request
     * @param Customer\Login\Request\Handler $handler
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function signup(Request $request, Customer\Login\Request\Handler $handler)
    {
        $data = json_decode($request->getContent(), true);

        $command = new Customer\Login\Request\Command($data['email']);
        $handler->handle($command);

        return $this->json(['status' => true],200);
    }
}