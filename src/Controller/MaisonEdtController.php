<?php

namespace App\Controller;

use App\Entity\MaisonEdt;
use App\Form\MaisonEdtType;
use App\Repository\MaisonEdtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/maison/edt")
 */
class MaisonEdtController extends AbstractController
{
    /**
     * @Route("/", name="maison_edt_index", methods={"GET"})
     */
    public function index(MaisonEdtRepository $maisonEdtRepository): Response
    {
        return $this->render('maison_edt/index.html.twig', [
            'maison_edts' => $maisonEdtRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="maison_edt_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $maisonEdt = new MaisonEdt();
        $form = $this->createForm(MaisonEdtType::class, $maisonEdt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maisonEdt);
            $entityManager->flush();
            $this->addFlash('success','Maison ajouté avec succcée!');


            return $this->redirectToRoute('maison_edt_index');
        }

        return $this->render('maison_edt/new.html.twig', [
            'maison_edt' => $maisonEdt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idMaisonEdt}", name="maison_edt_show", methods={"GET"})
     */
    public function show(MaisonEdt $maisonEdt): Response
    {
        return $this->render('maison_edt/show.html.twig', [
            'maison_edt' => $maisonEdt,
        ]);
    }

    /**
     * @Route("/{idMaisonEdt}/edit", name="maison_edt_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaisonEdt $maisonEdt): Response
    {
        $form = $this->createForm(MaisonEdtType::class, $maisonEdt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success','Maison modifier avec succcée!');

            return $this->redirectToRoute('maison_edt_index');
        }

        return $this->render('maison_edt/edit.html.twig', [
            'maison_edt' => $maisonEdt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idMaisonEdt}", name="maison_edt_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MaisonEdt $maisonEdt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maisonEdt->getIdMaisonEdt(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maisonEdt);
            $entityManager->flush();
            $this->addFlash('success','Maison supprimer avec succcée!');

        }

        return $this->redirectToRoute('maison_edt_index');
    }
}
