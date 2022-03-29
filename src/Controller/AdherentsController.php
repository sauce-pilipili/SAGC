<?php

namespace App\Controller;

use App\Entity\Adherents;
use App\Form\AdherentsType;
use App\Repository\AdherentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adherents")
 */
class AdherentsController extends AbstractController
{
    /**
     * @Route("/", name="app_adherents_index", methods={"GET"})
     */
    public function index(AdherentsRepository $adherentsRepository): Response
    {
        return $this->render('adherents/index.html.twig', [
            'adherents' => $adherentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_adherents_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AdherentsRepository $adherentsRepository): Response
    {
        $adherent = new Adherents();
        $form = $this->createForm(AdherentsType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherentsRepository->add($adherent);
            return $this->redirectToRoute('app_adherents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adherents/new.html.twig', [
            'adherent' => $adherent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adherents_show", methods={"GET"})
     */
    public function show(Adherents $adherent): Response
    {
        return $this->render('adherents/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_adherents_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Adherents $adherent, AdherentsRepository $adherentsRepository): Response
    {
        $form = $this->createForm(AdherentsType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherentsRepository->add($adherent);
            return $this->redirectToRoute('app_adherents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adherents/edit.html.twig', [
            'adherent' => $adherent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adherents_delete", methods={"POST"})
     */
    public function delete(Request $request, Adherents $adherent, AdherentsRepository $adherentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adherent->getId(), $request->request->get('_token'))) {
            $adherentsRepository->remove($adherent);
        }

        return $this->redirectToRoute('app_adherents_index', [], Response::HTTP_SEE_OTHER);
    }
}
