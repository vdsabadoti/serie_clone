<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GitTestController extends AbstractController
{
    #[Route('/git/test', name: 'app_git_test')]
    public function index(): Response
    {
        //Modifying this file to test PUSH : what if I PUSH a project to replace this one without update ?
        return $this->render('git_test/index.html.twig', [
            'controller_name' => 'GitTestController',
        ]);
    }
}
