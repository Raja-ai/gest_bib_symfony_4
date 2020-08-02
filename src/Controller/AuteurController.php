<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\Auteur1Type;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auteur")
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/", name="auteur_index", methods={"GET"})
     */
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="auteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(Auteur1Type::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $auteur->getPhoto();
            $file_name = md5(uniqid()).'.'.$file->guessExtension() ;
            $entityManager = $this->getDoctrine()->getManager();
            try{
                $file->move(
                    $this->getParameter('image_directory'),
                    $file_name
                );
            } catch (fileException $e){
                $this->addFlash('error', 'Image cannot be saved.');
             }
            $auteur->setPhoto($file_name);
            $entityManager->persist($auteur);
            $entityManager->flush();
            $this->addFlash('success','Auteur ajouter avec succcée!');
            
            return $this->redirectToRoute('auteur_index');
        }

        return $this->render('auteur/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAuteur}", name="auteur_show", methods={"GET"})
     */
    public function show(Auteur $auteur): Response
    {
        return $this->render('auteur/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }

    /**
     * @Route("/{idAuteur}/edit", name="auteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Auteur $auteur): Response
    {
        $form = $this->createForm(Auteur1Type::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $auteur->getPhoto();
            $file_name = md5(uniqid()).'.'.$file->guessExtension() ;
            $this->getDoctrine()->getManager()->flush();
            try{
                $file->move(
                    $this->getParameter('image_directory'),
                    $file_name
                );
            } catch (fileException $e){
                $this->addFlash('error', 'Image cannot be saved.');
             }
            $auteur->setPhoto($file_name);
            $this->addFlash('success','Auteur modifier avec succcée!');
            return $this->redirectToRoute('auteur_index');
        }

        return $this->render('auteur/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAuteur}", name="auteur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Auteur $auteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getIdAuteur(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($auteur);
            $entityManager->flush();
            $this->addFlash('success','Auteur supprimer avec succcée!');

        }

        return $this->redirectToRoute('auteur_index');
    }
}
