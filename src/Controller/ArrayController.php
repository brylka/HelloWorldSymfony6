<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArrayController extends AbstractController
{
    #[Route('/array', name: 'app_array')]
    public function array(Request $request): Response
    {
        $data = array(
            array('name' => 'Adam', 'surname' => 'Smith', 'age' => 35, 'email' => 'adam.smith@example.com'),
            array('name' => 'Emily', 'surname' => 'Jones', 'age' => 27, 'email' => 'emily.jones@example.com'),
            array('name' => 'Michael', 'surname' => 'Brown', 'age' => 42, 'email' => 'michael.brown@example.com'),
            array('name' => 'Samantha', 'surname' => 'Lee', 'age' => 23, 'email' => 'samantha.lee@example.com'),
            array('name' => 'William', 'surname' => 'Davis', 'age' => 31, 'email' => 'william.davis@example.com'),
            array('name' => 'Olivia', 'surname' => 'Miller', 'age' => 29, 'email' => 'olivia.miller@example.com'),
            array('name' => 'Benjamin', 'surname' => 'Wilson', 'age' => 38, 'email' => 'benjamin.wilson@example.com'),
            array('name' => 'Isabella', 'surname' => 'Taylor', 'age' => 26, 'email' => 'isabella.taylor@example.com'),
        );

        $sortBy = $request->query->get('sortBy', 'default');
        $sortOrder = $request->query->get('sortOrder', 'asc');

        if ($sortBy == 'name') {
            usort($data, function($a, $b) use ($sortOrder) {
                $result = strcmp($a['name'], $b['name']);
                return $sortOrder === 'asc' ? $result : -$result;
            });
        } elseif ($sortBy == 'surname') {
            usort($data, function($a, $b) use ($sortOrder) {
                $result = strcmp($a['surname'], $b['surname']);
                return $sortOrder === 'asc' ? $result : -$result;
            });
        } elseif ($sortBy == 'age') {
            usort($data, function($a, $b) use ($sortOrder) {
                $result = $a['age'] - $b['age'];
                return $sortOrder === 'asc' ? $result : -$result;
            });
        } elseif ($sortBy == 'email') {
            usort($data, function($a, $b) use ($sortOrder) {
                $result = strcmp($a['email'], $b['email']);
                return $sortOrder === 'asc' ? $result : -$result;
            });
        }

        return $this->render('array/index.html.twig', [
            'data' => $data,
            'sortOrder' => $sortOrder,
            'sortBy' => $sortBy
        ]);
    }
}
