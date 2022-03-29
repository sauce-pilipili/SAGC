<?php

namespace App\Controller;

use App\Entity\Joueurs;
use App\Form\JoueursType;
use App\Repository\JoueursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/joueurs")
 */
class JoueursController extends AbstractController
{
    /**
     * @Route("/equipe/{id}", name="app_joueurs_index", methods={"GET"})
     */
    public function index($id,JoueursRepository $joueursRepository): Response
    {

        return $this->render('joueurs/index.html.twig', [
            'joueurs' => $joueursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_joueurs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, JoueursRepository $joueursRepository): Response
    {
        $joueur = new Joueurs();
        $form = $this->createForm(JoueursType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $joueursRepository->add($joueur);
            return $this->redirectToRoute('app_joueurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('joueurs/new.html.twig', [
            'joueur' => $joueur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_joueurs_show", methods={"GET"})
     */
    public function show(Joueurs $joueur): Response
    {
        return $this->render('joueurs/show.html.twig', [
            'joueur' => $joueur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_joueurs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Joueurs $joueur, JoueursRepository $joueursRepository): Response
    {
        $form = $this->createForm(JoueursType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $joueursRepository->add($joueur);
            return $this->redirectToRoute('app_joueurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('joueurs/edit.html.twig', [
            'joueur' => $joueur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_joueurs_delete", methods={"POST"})
     */
    public function delete(Request $request, Joueurs $joueur, JoueursRepository $joueursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$joueur->getId(), $request->request->get('_token'))) {
            $joueursRepository->remove($joueur);
        }

        return $this->redirectToRoute('app_joueurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
