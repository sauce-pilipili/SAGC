<?php

namespace App\Controller;

use App\Entity\Joueurs;
use App\Form\JoueursType;
use App\Form\JoueursTypeEdit;
use App\Repository\EquipesRepository;
use App\Repository\JoueursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function index($id,Request $request,JoueursRepository $joueursRepository,EquipesRepository $equipesRepository): Response
    {
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(
                [
                    'content' => $this->renderView('joueurs/_contentJoueurs.html.twig',
                        [
                            'joueurs' => $joueursRepository->findBySearch($request->get('text')),
                            'id'=>$id,
                            'equipe'=> $equipesRepository->find($id),

                        ])
                ]);
        }


        return $this->render('joueurs/index.html.twig', [
            'joueurs' => $joueursRepository->findBy(['equipe'=>$id]),
            'id'=>$id,
            'equipe'=> $equipesRepository->find($id),
        ]);
    }

    /**
     * @Route("/new/{id}", name="app_joueurs_new", methods={"GET", "POST"})
     */
    public function new($id,Request $request, JoueursRepository $joueursRepository,EquipesRepository $equipesRepository): Response
    {
        $joueur = new Joueurs();
        $form = $this->createForm(JoueursType::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('imagePortrait')->getData();
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );
            $joueur->setImagePortrait($fichier);

            $joueur->setEquipe($equipesRepository->find($id));
            $joueursRepository->add($joueur);
            return $this->redirectToRoute('app_joueurs_index', ['id'=>$id], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('joueurs/new.html.twig', [
            'equipe'=> $equipesRepository->find($id),
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
        $form = $this->createForm(JoueursTypeEdit::class, $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('imagePortrait')->getData()!= null){
                $image = $form->get('imagePortrait')->getData();
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                unlink($this->getParameter('images_directory')."/".$joueur->getImagePortrait());
                $joueur->setImagePortrait($fichier);
            }
            $joueursRepository->add($joueur);
            return $this->redirectToRoute('app_joueurs_index', ['id'=>$joueur->getEquipe()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('joueurs/edit.html.twig', [
            'equipe'=>$joueur->getEquipe(),
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
            unlink($this->getParameter('images_directory')."/".$joueur->getImagePortrait());
            $joueursRepository->remove($joueur);
        }

        return $this->redirectToRoute('app_joueurs_index', ['id'=>$joueur->getEquipe()->getId()], Response::HTTP_SEE_OTHER);
    }
}
