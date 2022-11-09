<?php

namespace App\Controller;

use App\Entity\DomainName;
use App\Form\DomainNameFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DomainNameController extends AbstractController
{
    #[Route('/admin/domainName/', name: 'app_domain_name', methods:["GET","POST"])]
    public function creerDomaine(Request $request, EntityManagerInterface $entityManager): Response
    {
        $domainName = new DomainName();
        $form = $this->createForm(DomainNameFormType::class, $domainName);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($domainName);
            $entityManager->flush();

            $this->addFlash('success', 'Domain name created!');

        }

        return $this->renderForm('admin/domainNameForm.html.twig', [
            'domainNameForm' => $form,
        ]);
    }
}
