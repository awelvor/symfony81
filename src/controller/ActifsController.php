<?php

namespace App\Controller;

use App\Entity\Actifs;
use App\Form\ActifsForm;
use App\Repository\ActifsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/actifs')]
final class ActifsController extends AbstractController
{
    #[Route(name: 'app_actifs_index', methods: ['GET'])]
    public function index(ActifsRepository $actifsRepository): Response
    {
        return $this->render('actifs/index.html.twig', [
            'actifs' => $actifsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_actifs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $actif = new Actifs();
        $form = $this->createForm(ActifsForm::class, $actif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($actif);
            $entityManager->flush();

            return $this->redirectToRoute('app_actifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actifs/new.html.twig', [
            'actif' => $actif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actifs_show', methods: ['GET'])]
    public function show(Actifs $actif): Response
    {
        return $this->render('actifs/show.html.twig', [
            'actif' => $actif,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_actifs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actifs $actif, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActifsForm::class, $actif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_actifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actifs/edit.html.twig', [
            'actif' => $actif,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actifs_delete', methods: ['POST'])]
    public function delete(Request $request, Actifs $actif, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actif->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($actif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_actifs_index', [], Response::HTTP_SEE_OTHER);
    }
}
