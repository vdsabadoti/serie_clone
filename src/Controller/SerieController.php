<?php

namespace App\Controller;

use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    #[Route('/series', name: 'app_series')]
    public function list(SerieRepository $serieRepository): Response
    {
        $list = $serieRepository->findAll();
        return $this->render('serie/list.html.twig', [
            'series' => $list
        ]);
    }
}
