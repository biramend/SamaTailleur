<?php

namespace App\Controller;

use App\Entity\MesureHomme;
use App\Entity\Client;
use App\Form\MesureHommeType;
use App\Repository\MesureHommeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mesure/homme")
 */
class MesureHommeController extends AbstractController
{
    /**
     * @Route("/", name="mesure_homme_index", methods={"GET"})
     */
    public function index(MesureHommeRepository $mesureHommeRepository): Response
    {
        return $this->render('mesure_homme/index.html.twig', [
            'mesure_hommes' => $mesureHommeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mesure_homme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mesureHomme = new MesureHomme();
        $form = $this->createForm(MesureHommeType::class, $mesureHomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $client = new Client();
            //$mesureHomme->setClient($this->getDoctrine()->getRepository(Client::class)->find(getId()));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mesureHomme);
            $entityManager->flush();

            return $this->redirectToRoute('mesure_homme_index');
        }

        return $this->render('mesure_homme/new.html.twig', [
            'mesure_homme' => $mesureHomme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mesure_homme_show", methods={"GET"})
     */
    public function show(MesureHomme $mesureHomme): Response
    {
        return $this->render('mesure_homme/show.html.twig', [
            'mesure_homme' => $mesureHomme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mesure_homme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MesureHomme $mesureHomme): Response
    {
        $form = $this->createForm(MesureHommeType::class, $mesureHomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mesure_homme_index');
        }

        return $this->render('mesure_homme/edit.html.twig', [
            'mesure_homme' => $mesureHomme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mesure_homme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MesureHomme $mesureHomme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mesureHomme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mesureHomme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mesure_homme_index');
    }
}
