<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectProgressController extends AbstractController
{
    #[Route('/project', name: 'app_project_progress')]
    public function index(): Response
    {
        return $this->render('project_progress/project-progress.html.twig', [
            'controller_name' => 'ProjectProgressController',
        ]);
    }
}
