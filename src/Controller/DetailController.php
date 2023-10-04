<?php

namespace App\Controller;

use App\Entity\Detail;
use App\Form\DetailType;
use App\Repository\DetailRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/detail')]
class DetailController extends AbstractController
{

    #[Route('/', name: 'app_detail_index', methods: ['GET'])]
    public function index(DetailRepository $detailRepository): Response
    {
        return $this->render('detail/index.html.twig', [
            'details' => $detailRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_detail_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $detail = new Detail();
        $form = $this->createForm(DetailType::class, $detail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($detail);
            $entityManager->flush();

            return $this->redirectToRoute('app_detail_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('detail/new.html.twig', [
            'detail' => $detail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_detail_show', methods: ['GET'])]
    public function show(Detail $detail): Response
    {
        return $this->render('detail/show.html.twig', [
            'detail' => $detail,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_detail_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Detail $detail, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DetailType::class, $detail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_detail_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('detail/edit.html.twig', [
            'detail' => $detail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_detail_delete', methods: ['POST'])]
    public function delete(Request $request, Detail $detail, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detail->getId(), $request->request->get('_token'))) {
            $entityManager->remove($detail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_detail_index', [], Response::HTTP_SEE_OTHER);
    }
}
