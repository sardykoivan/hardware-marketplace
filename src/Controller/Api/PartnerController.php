<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Model\Marketplace\UseCase\Partner;
use Symfony\Component\HttpFoundation\JsonResponse;

class PartnerController extends AbstractController
{
    /**
     *
     * @Route("/api/partners/signup", methods={"POST"})
     *
     * @param Request $request
     * @param Partner\SignUp\Request\Handler $handler
     *
     * @return JsonResponse
     */
    public function add(Request $request, Partner\SignUp\Request\Handler $handler)
    {
        $data = json_decode($request->getContent(), true);

        $command = new Partner\SignUp\Request\Command($data['name'], $data['company_name'], $data['email']);
        $handler->handle($command);

        return $this->json(['status' => true],200);
    }
}