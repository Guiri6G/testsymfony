<?php

namespace App\Controller;


use App\Entity\SousSous;
use App\Repository\SousSousRepository;
use App\Entity\SousFamille;
use App\Repository\SousFamilleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchGS(SousSousRepository $SousSousRepository, Request $request)
    {
        $requestString = $request->get('search');



        $response = $SousSousRepository->findSousSous($requestString);
        return new Response(json_encode($response));
    }
}
