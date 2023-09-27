<?php

namespace App\Controller;

// use App\Repository\UserRepository as RepositoryUserRepository;
use ContainerDXOAAN3\UserRepository;
use RepositoryUserRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/admin', name: 'admin_')]

class AdminController extends AbstractController
{
    // #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * Liste les utilisateurs du site
     * @route('/utilisateur', name="utilisateur")
     */
     public function userList(UserRepository $user){
         return $this->render("admin/user.html.twig", [
             'user'=> $user -> findAll()
         ]);

     }
}

