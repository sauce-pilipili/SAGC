<?php

namespace App\Controller;

use App\Entity\Infos;
use App\Form\InfosType;
use App\Form\InfosTypeEdit;
use App\Repository\InfosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/infos")
 */
class InfosController extends AbstractController
{
    /**
     * @Route("/", name="app_infos_index", methods={"GET"})
     */
    public function index(InfosRepository $infosRepository): Response
    {
        return $this->render('infos/index.html.twig', [
            'documents' => $infosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_infos_new", methods={"GET", "POST"})
     */
    public function new(Request $request, InfosRepository $infosRepository, SluggerInterface $slugger): Response
    {
        $info = new Infos();
        $form = $this->createForm(InfosType::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brochureFile = $form->get('document')->getData();
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $brochureFile->guessExtension();
                $info->setNomDocument($originalFilename);
                $info->setDocument($newFilename);
                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    return $this->redirectToRoute('app_infos_index', [], Response::HTTP_SEE_OTHER);
                }
            }
            $infosRepository->add($info);
            return $this->redirectToRoute('app_infos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('infos/new.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_infos_show", methods={"GET"})
     */
    public function show(Infos $info): Response
    {
        return $this->render('infos/show.html.twig', [
            'info' => $info,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_infos_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Infos $info, InfosRepository $infosRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(InfosTypeEdit::class, $info);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('document')->getData() != null) {
                $brochureFile = $form->get('document')->getData();
                if ($brochureFile) {
                    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $brochureFile->guessExtension();
                    $info->setNomDocument($originalFilename);
                    unlink($this->getParameter('brochures_directory')."/".$info->getDocument());
                    $info->setDocument($newFilename);
                    // Move the file to the directory where brochures are stored
                    try {
                        $brochureFile->move(
                            $this->getParameter('brochures_directory'),
                            $newFilename
                        );

                    } catch (FileException $e) {
                        return $this->redirectToRoute('app_infos_index', [], Response::HTTP_SEE_OTHER);
                    }
                }
            }
            $infosRepository->add($info);
            return $this->redirectToRoute('app_infos_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('infos/edit.html.twig', [
            'info' => $info,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_infos_delete", methods={"POST"})
     */
    public function delete(Request $request, Infos $info, InfosRepository $infosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $info->getId(), $request->request->get('_token'))) {
            unlink($this->getParameter('brochures_directory')."/".$info->getDocument());
            $infosRepository->remove($info);
        }

        return $this->redirectToRoute('app_infos_index', [], Response::HTTP_SEE_OTHER);
    }
}
