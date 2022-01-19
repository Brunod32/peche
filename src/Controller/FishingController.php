<?php

namespace App\Controller;

use App\Entity\Fishing;
use App\Form\FishingType;
use App\Repository\FishingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fishing')]
class FishingController extends AbstractController
{
    #[Route('/', name: 'fishing_index', methods: ['GET'])]
    public function index(FishingRepository $fishingRepository): Response
    {
        return $this->render('fishing/index.html.twig', [
            'fishings' => $fishingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'fishing_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fishing = new Fishing();
        $form = $this->createForm(FishingType::class, $fishing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fishing);
            $entityManager->flush();

            return $this->redirectToRoute('fishing_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fishing/new.html.twig', [
            'fishing' => $fishing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'fishing_show', methods: ['GET'])]
    public function show(Fishing $fishing): Response
    {
        return $this->render('fishing/show.html.twig', [
            'fishing' => $fishing,
        ]);
    }

    #[Route('/{id}/edit', name: 'fishing_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fishing $fishing, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FishingType::class, $fishing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fishing_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fishing/edit.html.twig', [
            'fishing' => $fishing,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'fishing_delete', methods: ['POST'])]
    public function delete(Request $request, Fishing $fishing, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fishing->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fishing);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fishing_index', [], Response::HTTP_SEE_OTHER);
    }
}
