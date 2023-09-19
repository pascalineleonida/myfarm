<?php

namespace App\Controller;

use App\Entity\Assistance;
use App\Form\Assistance1Type;
use App\Repository\AssistanceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/assistance')]
class AssistanceController extends AbstractController
{
    #[Route('/', name: 'app_assistance_index', methods: ['GET'])]
    public function index(AssistanceRepository $assistanceRepository): Response
    {
        return $this->render('assistance/index.html.twig', [
            'assistances' => $assistanceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_assistance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $assistance = new Assistance();
        $form = $this->createForm(Assistance1Type::class, $assistance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($assistance);
            $entityManager->flush();

            return $this->redirectToRoute('app_assistance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assistance/new.html.twig', [
            'assistance' => $assistance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_assistance_show', methods: ['GET'])]
    public function show(Assistance $assistance): Response
    {
        return $this->render('assistance/show.html.twig', [
            'assistance' => $assistance,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_assistance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Assistance $assistance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Assistance1Type::class, $assistance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_assistance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assistance/edit.html.twig', [
            'assistance' => $assistance,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_assistance_delete', methods: ['POST'])]
    public function delete(Request $request, Assistance $assistance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assistance->getId(), $request->request->get('_token'))) {
            $entityManager->remove($assistance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_assistance_index', [], Response::HTTP_SEE_OTHER);
    }
}
