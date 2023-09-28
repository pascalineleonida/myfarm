<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
/**
* @route("/", name="index")
*/
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * liste des  utilisateurs du site
     * @route("/utilisateur", name="utilisateur")
     */
    public function UserList(UserRepository $User){
        return $this->render("admin/user.html.twig". [
            'user' => $User->findAll()
        ]);

    }
    /**
     * Modifier un Utilisateur
     * 
     * @Route("utilisateur/Modifier{id}", name="modifier_utilisateur")
     */

    public function editUser(User $user, Request $request){
       $form = $this->CreateForm(EditUserType::class, $user);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
        $entityManager = $this->$this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('message', 'utilisateur modifier avec succes');
        return $this->redirectToRoute('admin_utilisateur');
       }
       return $this->render('admin/editeuser.html.twig',[
        'userForm' => $form->createView()
       ]);
    }
    /**
     * Modifier un Utilisateur
     * 
     * @Route("Article/Modifier{id}", name="modifier_article")
     */
    public function modifArticle(){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // ici il faut etre admin

    }
}
