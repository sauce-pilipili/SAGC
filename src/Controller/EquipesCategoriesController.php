<?php

namespace App\Controller;

use App\Entity\EquipesCategories;
use App\Form\EquipesCategoriesType;
use App\Repository\EquipesCategoriesRepository;
use App\Repository\EquipesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equipes/categories")
 */
class EquipesCategoriesController extends AbstractController
{
    /**
     * @Route("/", name="app_equipes_categories_index", methods={"GET"})
     */
    public function index(Request $request, EquipesCategoriesRepository $equipesCategoriesRepository, EquipesRepository $equipesRepository): Response
    {

        if ($request->isXmlHttpRequest()) {
            $equipes_categories = $equipesCategoriesRepository->findAll();
            $equipes = $equipesRepository->findBySearch($request->get('text'));
            return new JsonResponse([
                'ok' => $this->getUser()->getRoles(),
                'content' => $this->renderView('equipes_categories/_contentEquipeCategorite.html.twig', compact('equipes', 'equipes_categories'))
            ]);
        }

        return $this->render('equipes_categories/index.html.twig', ['equipes_categories' => $equipesCategoriesRepository->findAll(),
            'equipes' => $equipesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="app_equipes_categories_new", methods={"GET", "POST"})
     */
    public
    function new(Request $request, EquipesCategoriesRepository $equipesCategoriesRepository): Response
    {
        $equipesCategory = new EquipesCategories();
        $form = $this->createForm(EquipesCategoriesType::class, $equipesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equipesCategoriesRepository->add($equipesCategory);
            return $this->redirectToRoute('app_equipes_categories_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipes_categories/new.html.twig', [
            'equipes_category' => $equipesCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_equipes_categories_show", methods={"GET"})
     */
    public function show(EquipesCategories $equipesCategory): Response
    {
        return $this->render('equipes_categories/show.html.twig', [
            'equipes_category' => $equipesCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_equipes_categories_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EquipesCategories $equipesCategory, EquipesCategoriesRepository $equipesCategoriesRepository): Response
    {
        $form = $this->createForm(EquipesCategoriesType::class, $equipesCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $equipesCategoriesRepository->add($equipesCategory);
            return $this->redirectToRoute('app_equipes_categories_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipes_categories/edit.html.twig', [
            'equipes_category' => $equipesCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_equipes_categories_delete", methods={"POST"})
     */
    public function delete(Request $request, EquipesCategories $equipesCategory, EquipesCategoriesRepository $equipesCategoriesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $equipesCategory->getId(), $request->request->get('_token'))) {
            $equipesCategoriesRepository->remove($equipesCategory);
        }

        return $this->redirectToRoute('app_equipes_categories_index', [], Response::HTTP_SEE_OTHER);
    }
}
