<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetController extends AbstractController
{
    #[Route('/get', name: 'app_get')]
    public function index(Request $request): Response
    {
        $name = $request->query->get('name');
        $surname = $request->query->get('surname');

        return $this->render('get/index.html.twig', [
            'name' => $name,
            'surname' => $surname,
        ]);
    }
}
