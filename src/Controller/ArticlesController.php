<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles")
 */
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="app_articles_index", methods={"GET"})
     */
    public function indexarticles(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('articles/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{id}", name="app_articles_new", methods={"GET", "POST"})
     */
    public function newarticles($id,Request $request, ArticlesRepository $articlesRepository,CategoriesRepository $categoriesRepository): Response
    {
        $article = new Articles();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('imageEnAvant')->getData() != null) {
                $image = $form->get('imageEnAvant')->getData();
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                $article->setImageEnAvant($fichier);
            }
            $article->setCreatedDate(new \DateTime('now'));
            $article->setUpDatedDate(new \DateTime('now'));
            $article->setCategorie($categoriesRepository->find($id));
            $articlesRepository->add($article);

            return $this->redirectToRoute('app_categories_index');
        }
        return $this->render('articles/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_articles_show", methods={"GET"})
     */
    public function showarticles(Articles $article): Response
    {
        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_articles_edit", methods={"GET", "POST"})
     */
    public function editarticles(Request $request, Articles $article, ArticlesRepository $articlesRepository,CategoriesRepository $categoriesRepository): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('imageEnAvant')->getData() != null) {
                $image = $form->get('imageEnAvant')->getData();
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                $article->setImageEnAvant($fichier);
            }
            $article->setUpDatedDate(new \DateTime('now'));
            $articlesRepository->add($article);
            return $this->redirectToRoute('app_categories_index');
        }

        return $this->renderForm('articles/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_articles_delete", methods={"POST"})
     */
    public function deletearticles(Request $request, Articles $article, ArticlesRepository $articlesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            unlink($this->getParameter('images_directory')."/".$article->getImageEnAvant());
            $articlesRepository->remove($article);
        }

        return $this->redirectToRoute('app_categories_index');
    }

}
