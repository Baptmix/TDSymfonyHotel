<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatutController extends AbstractController
{
    /**
     * @Route("/statut", name="statut")
     */
    public function index(): Response
    {
        return $this->render('statut/login.html.twig', [
            'controller_name' => 'StatutController',
        ]);
    }
}
