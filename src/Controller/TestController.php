<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TestController extends AbstractController
{
    public function dbVersion(Connection $db)
    {
        $result = $db->executeQuery('SELECT version()')->fetchAssociative();

        return new JsonResponse($result);
    }
}