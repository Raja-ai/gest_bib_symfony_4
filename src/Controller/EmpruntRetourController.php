<?php

namespace App\Controller;

use App\Entity\EmpruntRetour;
use App\Form\EmpruntRetourType;
use App\Repository\EmpruntRetourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/emprunt/retour")
 */
class EmpruntRetourController extends AbstractController
{
    /**
     * @Route("/", name="emprunt_retour_index", methods={"GET"})
     */
    public function index(EmpruntRetourRepository $empruntRetourRepository): Response
    {
        return $this->render('emprunt_retour/index.html.twig', [
            'emprunt_retours' => $empruntRetourRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="emprunt_retour_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $empruntRetour = new EmpruntRetour();
        $form = $this->createForm(EmpruntRetourType::class, $empruntRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($empruntRetour);
            $entityManager->flush();
            $this->addFlash('success','EmpruntRetour ajouté avec succcée!');


            return $this->redirectToRoute('emprunt_retour_index');
        }

        return $this->render('emprunt_retour/new.html.twig', [
            'emprunt_retour' => $empruntRetour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEmpruntRetour}", name="emprunt_retour_show", methods={"GET"})
     */
    public function show(EmpruntRetour $empruntRetour): Response
    {
        return $this->render('emprunt_retour/show.html.twig', [
            'emprunt_retour' => $empruntRetour,
        ]);
    }

    /**
     * @Route("/{idEmpruntRetour}/edit", name="emprunt_retour_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EmpruntRetour $empruntRetour): Response
    {
        $form = $this->createForm(EmpruntRetourType::class, $empruntRetour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success','EmpruntRetour modifié avec succcée!');


            return $this->redirectToRoute('emprunt_retour_index');
        }

        return $this->render('emprunt_retour/edit.html.twig', [
            'emprunt_retour' => $empruntRetour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEmpruntRetour}", name="emprunt_retour_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EmpruntRetour $empruntRetour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empruntRetour->getIdEmpruntRetour(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($empruntRetour);
            $entityManager->flush();
            $this->addFlash('success','EmpruntRetour sumprimé avec succcée!');

        }

        return $this->redirectToRoute('emprunt_retour_index');
    }
}
