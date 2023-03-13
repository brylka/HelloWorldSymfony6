<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator/{a}/{b}',
        name: 'app_calculator',
        requirements: ['a' => '-?\d+', 'b' => '-?\d+'],
        defaults: ['a' => 0, 'b' => 0])]
    public function index(Request $request, $a = 0, $b = 0): Response
    {
        // odczytanie wartości z adresu URL
        $aValue = $a;
        $bValue = $b;

        $sum = $aValue + $bValue;

        return $this->render('calculator/index.html.twig', [
            'a' => $a,
            'b' => $b,
            'sum' => $sum,
        ]);
    }
}
