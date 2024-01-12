<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\AjoutProduitType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $produit = new Produits();
        $form = $this->createForm(AjoutProduitType::class, $produit);
        $form->handleRequest($request);

        // Condition valide lorsque le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            // Message flash/toast
            $this->addFlash('success', 'Produit ajouté avec succès');

            // Redirection vers Homepage
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('produits/index.html.twig', [
            'formProduit' => $form->createView(),
        ]);
    }
}
