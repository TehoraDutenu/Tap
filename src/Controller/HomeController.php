<?php

use App\Repository\DomaineRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    <!-- Route -->
    #[Route('/'), name: 'index']

    public function index(DomaineRepository $domaineRepository, Request $request)
    {
        <!-- Variables -->
        $title = "Les Domaines";
        $domaines = $domaineRepository->findAll();

        <!-- Rendu -->
        return $this->render('home/index.html.twig', [
            'title' => $title,
            'domaines' => $domaines
        ]);
    }
}