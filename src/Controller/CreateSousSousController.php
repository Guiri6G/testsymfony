<?php

namespace App\Controller;

use App\Entity\SousSous;
use App\Form\SousSousType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateSousSousController extends AbstractController
{
    /**
     * @Route("/create/sousSous", name="create_sousSous")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $sousSous = new SousSous();

        $form = $this->createForm(SousSousType::class, $sousSous, [
            'method' => 'POST'
        ]);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousSous);
            $em->flush();

            return $this->redirectToRoute('voir_sousSous');
        }



        return $this->render('create_sous_sous/index.html.twig', [
            'controller_name' => 'CreateSousSousController', "form" => $form->createView()
        ]);
    }
}
