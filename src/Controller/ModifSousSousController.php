<?php

namespace App\Controller;

use App\Entity\SousFamille;
use App\Entity\SousSous;
use App\Form\SousSousType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModifSousSousController extends AbstractController
{
    /**
     * @Route("/modif/sousSous/{id}", name="modif_sousSous")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, $id): Response
    {

        $sousSous = new SousSous();

        $sousSous = $this->getDoctrine()->getRepository(SousSous::class)->find($id);


        $form = $this->createForm(SousSousType::class, $sousSous, [
            'method' => 'POST'
        ]);

        // handle the request
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousSous);
            $em->flush();

            return $this->redirectToRoute('voir_sousSous');
        }


        return $this->render('modif_sous_sous/index.html.twig', [
            'controller_name' => 'ModifSousSousController', "formSFamille" => $form->createView()
        ]);
    }
}
