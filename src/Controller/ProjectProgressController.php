<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\DomainNameRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProjectProgressController extends AbstractController
{
//    #[Route('/project', name: 'app_project_progress')]
//    public function index(): Response
//    {
//        return $this->render('project_progress/project-progress.html.twig', [
//            'controller_name' => 'ProjectProgressController',
//        ]);
//    }


    #[Route('/project', name: 'app_project_progress', methods:["GET","POST"])]
    public function domainNamesList(DomainNameRepository $domainNameRepository, UserRepository $userRepository ): Response
    {
        $domainNamesList = $domainNameRepository->findAll();

//        $user = $userRepository->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);
//        $user = $userRepository->findOneBy(['email' => $this->getUser()->getId()]);
        $id = $this->getUser()->getId();
//        dump($id);
        $domainNamesList = $domainNameRepository->findByUser($id);
//        $domainNamesList = $domainNameRepository->findByUser($user);









//        $userId = $this->getId();
//        dump($userId);
//        $domainNamesList = $domainNameRepository->findByUser($userId);


//        $idUser = $this->getId();
//        $domainNamesByUser = $domainNameRepository->findBy(['id'=>22]);
//        $user = $userRepository->find($id);
//        dump($domainNamesList);

        return $this->render('project_progress/project-progress.html.twig', [
            'domainNamesList' => $domainNamesList,
        ]);
    }

     #[Route('/project/domainNamesByUser', name: 'app_project_progress_domainNamesByUser', methods:["GET","POST"])]
    public function domainNamesByUser(DomainNameRepository $domainNameRepository, ): Response
    {
//        $idUser = $this->getId();
//        $domainNamesByUser = $domainNameRepository->findBy(['users'=>13]);

//        $domainNamesByUser =

        $domainNamesByUser = $domainNameRepository->findBy(['id'=>22]);
//        $user = $userRepository->find($id);
//        dump($domainNamesByUser);

        return $this->render('project_progress/project-progress.html.twig', [
            'domainNamesByUser' => $domainNamesByUser,
        ]);
    }

    #[Route('/project/infos/{id}', name: 'app_project_progress_domainNamesByUser_id', methods:["GET","POST"])]
    public function infos(int $id, DomainNameRepository $domainNameRepository, ): Response
    {
//        $idUser = $this->getId();
        $domainNamesByUser = $domainNameRepository->findOneBy(['id'=>22]);
//        $user = $userRepository->find($id);
        dump($domainNamesByUser);

        return $this->render('project_progress/project-progress.html.twig', [
            'domainNamesByUser' => $domainNamesByUser,
        ]);
    }




}
