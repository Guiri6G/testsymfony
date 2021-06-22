<?php

namespace App\Controller;

use App\Repository\SousSousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;

class VoirSousSousController extends AbstractController
{
    /**
     * @Route("/voir/sousSous", name="voir_sousSous")
     */
    public function index(SousSousRepository $sousSousRepository): Response
    {
        return $this->render('voir_sous_sous/index.html.twig', [
            'controller_name' => 'VoirSousSousController',
            'SSFamilles' => $sousSousRepository->findAll()
        ]);
    }

    /**
     * @Route("/voir/sousSous/{id}", name="delete_sousSous")
     */

    public function deleteS($id, SousSousRepository $sousSousRepository, EntityManagerInterface $em)
    {


        try {

            $sousSous = $sousSousRepository->findOneBy(['id' => $id]);
            $em->remove($sousSous);
            $em->flush();

            return $this->redirectToRoute("voir_sousSous");
        } catch (NotEncodableValueException $e) {

            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
