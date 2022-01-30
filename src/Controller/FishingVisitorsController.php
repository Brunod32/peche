<?php

namespace App\Controller;

use App\Repository\FishingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FishingVisitorsController extends AbstractController
{
    #[Route('/fishing/visitors', name: 'fishing_visitors')]
    public function index(FishingRepository $fishingRepository): Response
    {
        return $this->render('fishing_visitors/index.html.twig', parameters: [
            'fishings' => $fishingRepository->findAll(),
        ]);
    }
}
