<?php

namespace App\Controller;

use App\Entity\Chambre;
use App\Form\ChambreType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Chambre::class);
        $chambres = $repo->findAll();

        return $this->render('chambre/index.html.twig', [
            'controller_name' => 'ChambreController',
            'chambres' => $chambres
        ]);
    }

    /**
     * @Route("/chambre/new", name="chambre_create")
     */
    public function create(Request $request) {
        // Manager Doctrine ORM
        $entityManager = $this->getDoctrine()->getManager();

        // Création formulaire
        $form = $this->createForm(ChambreType::class);
        // Récupérer les données du formulaire
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $chambre = new Chambre();
            $chambre->setNumero($formData->getNumero());
            $chambre->setEtage($formData->getEtage());
            $chambre->setStatut($formData->getStatut());
            $chambre->setAssignedTo($formData->getAssignedTo());

            // Persistance des données de la chambre
            $entityManager->persist($chambre);
            $entityManager->flush();
            // Redirection vers une route
            return $this->redirectToRoute('chambre');
        }


        return $this->render('chambre/create.html.twig', [
            'formChambre' => $form->createView()
        ]);
    }



    /**
     * @Route("/chambre/edit/{id}", name="chambre_edit")
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $produit = $entityManager->getRepository(Chambre::class)->find($id);

        $form = $this->createForm(ChambreType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('chambre');
        }

        return $this->render('chambre/edit.html.twig', [
            'formChambre' => $form->createView()
        ]);
    }



    /**
     * @Route("/chambre/delete/{id}", name="chambre_delete")
     */
    public function delete(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $chambre = $entityManager->getRepository(Chambre::class)->find($id);

        $entityManager->remove($chambre);
        $entityManager->flush();

        return $this->redirectToRoute('chambre');
    }
}
