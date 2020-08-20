<?php

namespace App\Controller;

use App\Entity\Rp;
use App\Form\RpType;
use App\Repository\RpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rps")
 */
class RpController extends AbstractController
{
    /**
     * @Route("/", name="rp_index", methods={"GET"})
     */
    public function index(RpRepository $rpRepository): Response
    {
        return $this->render('rp/index.html.twig', [
            'rps' => $rpRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rp_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rp = new Rp();
        $form = $this->createForm(RpType::class, $rp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rp);
            $entityManager->flush();

            return $this->redirectToRoute('rp_index');
        }

        return $this->render('rp/new.html.twig', [
            'rp' => $rp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rp_show", methods={"GET"})
     */
    public function show(Rp $rp): Response
    {
        return $this->render('rp/show.html.twig', [
            'rp' => $rp,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rp_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rp $rp): Response
    {
        $form = $this->createForm(RpType::class, $rp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rp_index');
        }

        return $this->render('rp/edit.html.twig', [
            'rp' => $rp,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rp_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Rp $rp): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rp->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rp);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rp_index');
    }
}
