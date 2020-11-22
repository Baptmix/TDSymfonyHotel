<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeController extends AbstractController
{
    /**
     * @Route("/employe", name="employe")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Employe::class);
        $employes = $repo->findAll();

        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
            'employes'=>$employes
        ]);
    }

    /**
     * @Route("/employe/new", name="employe_create")
     */
    public function create(Request $request) {
        // Manager Doctrine ORM
        $entityManager = $this->getDoctrine()->getManager();

        // Création formulaire
        $form = $this->createForm(EmployeType::class);
        // Récupérer les données du formulaire
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $employe = new Employe();
            $employe->setNom($formData->getNom());
            $employe->setPrenom($formData->getPrenom());
            $employe->setRole($formData->getRole());

            // Persistance des données de la chambre
            $entityManager->persist($employe);
            $entityManager->flush();
            // Redirection vers une route
            return $this->redirectToRoute('employe');
        }


        return $this->render('employe/create.html.twig', [
            'formEmploye' => $form->createView()
        ]);
    }


    /**
     * @Route("/employe/edit/{id}", name="employe_edit")
     */
    public function update(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $produit = $entityManager->getRepository(Employe::class)->find($id);

        $form = $this->createForm(EmployeType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('employe');
        }

        return $this->render('employe/edit.html.twig', [
            'formEmploye' => $form->createView()
        ]);
    }



    /**
     * @Route("/employe/delete/{id}", name="employe_delete")
     */
    public function delete(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $chambre = $entityManager->getRepository(Employe::class)->find($id);

        $entityManager->remove($chambre);
        $entityManager->flush();

        return $this->redirectToRoute('employe');
    }
}
