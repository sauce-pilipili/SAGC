<?php

namespace App\Controller;

use App\Entity\Adherents;
use App\Form\AdherentsType;
use App\Repository\AdherentsRepository;
use App\Repository\ArticlesRepository;
use App\Repository\CategoriesRepository;
use App\Repository\MatchsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Exception\ExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main")
     */
    public function index(MatchsRepository $matchsRepository, ArticlesRepository $articlesRepository): Response
    {
        //        le prochain match
        $prochainMatch = $matchsRepository->nextMatch();
//        les trois derniers resultats
        $resultats = $matchsRepository->troisDerniersMatchs();
//        les trois der articles
        $articles = $articlesRepository->troisDerniersArticles();
        return $this->render('main/index.html.twig', [
            'match' => $prochainMatch,
            'resultats' => $resultats,
            'articles' => $articles
        ]);
    }


    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function inscription(Request $request, AdherentsRepository $adherentsRepository): Response
    {
        $adherent = new Adherents();
        $form = $this->createForm(AdherentsType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherentsRepository->add($adherent);
            $this->addFlash('success', 'Votre demande d\'inscription à bien été prise en compte');
            return $this->render('main/index.html.twig', [
//                'form' => $form->createView()
            ]);
        }
        return $this->render('main/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/nos-equipes", name="app_nos_equipes")
     */
    public function equipes(ArticlesRepository $articlesRepository): Response
    {
        $articles = $articlesRepository->troisDerniersArticles();
        return $this->render('main/nos-equipes-pages.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/actualite/{categorie}", name="app_actualite")
     */
    public function actualite(CategoriesRepository $categoriesRepository, ArticlesRepository $articlesRepository, $categorie = null): Response
    {
        $categories = $categoriesRepository->findBy(['parent' => null]);
        if ($categorie == null) {
            $articles = $articlesRepository->findAll();
        } else {
            $articleCategorie = $categoriesRepository->findBy(['parent' => $categorie]);
            $articles = $articlesRepository->findBy(['categorie' => $articleCategorie]);
        }
        return $this->render('main/actualite.html.twig', [
            'categories' => $categories,
            'articles' => $articles
        ]);
    }

    /**
     * @Route("article/{slug}", name="app_sagc_article")
     */
    public function article($slug, ArticlesRepository $articlesRepository): Response
    {
        $article = $articlesRepository->findOneBy(['slug' => $slug]);
        $articleMemeCategorie = $articlesRepository->findBy(['categorie'=>$article->getCategorie()],null,3);
        return $this->render('main/article.html.twig', [
            'article' => $article,
            'articles'=>$articleMemeCategorie
        ]);
    }

    /**
     * @Route("/info", name="app_info")
     */
    public function info(): Response
    {
        return $this->render('main/info.html.twig', [

        ]);
    }


    /**
     * @Route("/club", name="app_club")
     */
    public function club(): Response
    {
        return $this->render('main/club.html.twig', [

        ]);
    }


    /**
     * @Route("/contact", name="app_contact",methods={"GET","POST"})
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')){
            $emailContact = (new Email())
                ->from($this->valid_donnees($request->get('email')))
                ->to('contact@jade-immobilier.fr')
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Demande de contact')
                ->text(
                    $this->valid_donnees($request->get('nom')) .' '.
                    $this->valid_donnees($request->get('prenom')) . ' '.
                    $this->valid_donnees($request->get('email')). ' a un message pour vous: ' .
                    $this->valid_donnees($request->get('request')));
            try {
                $mailer->send($emailContact);
                $this->addFlash('success', 'Votre message a bien été envoyé');
                return $this->redirectToRoute('app_contact');
            } catch (ExceptionInterface $exception) {
                $this->addFlash('danger', 'l\'adresse email renseigné n\'est pas valable');
                return $this->redirectToRoute('app_contact');
            }
        }
        return $this->render('main/contact.html.twig', [

        ]);
    }


    /**
     * @Route("/prestation", name="app_prestation")
     */
    public function prestation(): Response
    {
        return $this->render('main/prestation.html.twig', [

        ]);
    }

    public function ValidFiles($file)
    {
        $extension = $file->guessExtensions;
    }

    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
}
