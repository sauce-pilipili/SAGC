<?php

namespace App\Controller;

use App\Entity\Adversaires;
use App\Form\AdversairesType;
use App\Repository\AdversairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adversaires")
 */
class AdversairesController extends AbstractController
{
    /**
     * @Route("/", name="app_adversaires_index", methods={"GET"})
     */
    public function index(AdversairesRepository $adversairesRepository): Response
    {
        return $this->render('adversaires/index.html.twig', [
            'adversaires' => $adversairesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_adversaires_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AdversairesRepository $adversairesRepository): Response
    {
        $adversaire = new Adversaires();
        $form = $this->createForm(AdversairesType::class, $adversaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('logo')->getData();
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );
            $adversaire->setLogo($fichier);
            $adversairesRepository->add($adversaire);
            return $this->redirectToRoute('app_adversaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adversaires/new.html.twig', [
            'adversaire' => $adversaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adversaires_show", methods={"GET"})
     */
    public function show(Adversaires $adversaire): Response
    {
        return $this->render('adversaires/show.html.twig', [
            'adversaire' => $adversaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_adversaires_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Adversaires $adversaire, AdversairesRepository $adversairesRepository): Response
    {
        $form = $this->createForm(AdversairesType::class, $adversaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            unlink($this->getParameter('images_directory')."/".$adversaire->getLogo());
            $image = $form->get('logo')->getData();
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );
            $adversaire->setLogo($fichier);
            $adversairesRepository->add($adversaire);
            return $this->redirectToRoute('app_adversaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adversaires/edit.html.twig', [
            'adversaire' => $adversaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_adversaires_delete", methods={"POST"})
     */
    public function delete(Request $request, Adversaires $adversaire, AdversairesRepository $adversairesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adversaire->getId(), $request->request->get('_token'))) {
            unlink($this->getParameter('images_directory')."/".$adversaire->getLogo());
            $adversairesRepository->remove($adversaire);
        }

        return $this->redirectToRoute('app_adversaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
