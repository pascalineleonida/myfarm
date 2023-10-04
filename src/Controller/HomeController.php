<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ProduitRepository $repo): Response
    {
        $liste = $repo->findAll();

        return $this->render('home/index.html.twig', [
        'liste_twig' => $liste,            
        ]);
    }
    
    #[Route('/produit/{id}', name: 'route_produit')]
    public function produit($id, ProduitRepository $repo): Response
    {
        $produit = $repo->find($id);

        return $this->render('home/produit.html.twig', [
            'produit' => $produit, 
        ]);
    }
}

