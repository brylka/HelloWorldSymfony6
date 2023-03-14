<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\{TextType, SubmitType};

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function form(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Wyślij'])
            ->getForm()
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->render('form/form_submit.html.twig', [
                'name' => $data['name'],
                'surname' => $data['surname']
            ]);
        }

        return $this->render('form/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
