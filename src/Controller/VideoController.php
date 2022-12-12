<?php

namespace App\Controller;

use App\Form\Type\VideoType;
use App\Repository\VideoRepository;
use App\Service\VideoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    #[Route('/video', name: 'app_video', methods:["GET","POST"])]
    public function index(RequestStack $requestStack, VideoRepository $videoRepo, VideoService $videoService): Response
    {
        $request = $requestStack->getMainRequest();
        $videoForm = $this->createForm(VideoType::class,  $videoRepo->new());
        $videoForm->handleRequest($request);
        if ($videoForm->isSubmitted()) {

            $this->redirectToRoute('app_home');
            $this->addFlash('success', 'Vidéo ajoutée !');
            return $videoService->handleVideoForm($videoForm);

        }

        return $this->render('video/index.html.twig', [
            'videoForm' => $videoForm->createView(),
            'videos' => $videoRepo->findAll()
        ]);
    }
}
