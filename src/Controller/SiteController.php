<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    #[Route('/', name: 'app_site')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('siteweb/accueil.html.twig', [
            'controller_name' => 'SiteController',
            'produits' => $produitRepository->findAll()
        ]);
    }
}
