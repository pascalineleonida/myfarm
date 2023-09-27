<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @route("/card",name="card_")
 */
class CardController extends AbstractController
{
     /**
     * @route("/",name="index")
     */
    public function index(SessionInterface $session, ProduitRepository $productsRepository): Response 

    {
        $panier = $session->get("panier", []);

        // on "fabriques" les donnees

        $dataPanier = [];
        $total = 0;

            foreach ((array) $panier as  $id => $quantite){
             $produit = $productsRepository->find($id);
             $dataPanier [] =[
                 "produit" => $produit,
                 "quantite" => $quantite
             ];
              $total += $produit->getPrix() * $quantite;
     }
    
        return $this->render('card/index.html.twig', compact("dataPanier","total")); 
        
     }
/**
 * @route("/add/{id}", name="add")
 */
public function add(Produit $Produit , SessionInterface $session)
{
    //on recupere le panier actuel
    $panier = $session->get("panier", []);
    $id = $Produit->getId();

if(!empty($panier[$id])){
    $panier[$id]++;
}else{
    $panier->$id = 1;
    }
    //on sauvegade dans la session 
    $session->set("panier", $panier);

    return $this->redirectToRoute("card_index");
 
  }
/**
 * @route("/remove/{id}", name="remove")
 */
public function remove(Produit $Produit , SessionInterface $session)
{
    //on recupere le panier actuel
    $panier = $session->get("panier", []);
    $id = $Produit->getId();

if(!empty($panier[$id])){
    if($panier[$id] > 1){
        $panier[$id];
    }else{
        unset($panier[$id]);
    }
}
    //on sauvegade dans la session 
    $session->set("panier", $panier);

    return $this->redirectToRoute("card_index");
 
  }
/**
 * @route("/delete/{id}", name="delete")
 */
public function delete(Produit $Produit , SessionInterface $session)
{
    //on recupere le panier actuel
    $panier = $session->get("panier", []);
    $id = $Produit->getId();

if(!empty($panier[$id])){
    unset($panier[$id]); 
}

    //on sauvegade dans la session 
    $session->set("panier", $panier);

    return $this->redirectToRoute("card_index");
 
  }
  /**
 * @route("/delete", name="delete_all")
 */
public function deleteAll(SessionInterface $session)
{
    $session->remove("panier");

    return $this->redirectToRoute("card_index");
 
  }
}
