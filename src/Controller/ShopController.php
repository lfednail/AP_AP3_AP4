<?php

namespace App\Controller;

use App\Entity\PRODUIT;
use App\Entity\Categorie;
use App\Repository\PRODUITRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop')]
    public function index(PRODUITRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
        return $this->render('shop/index.html.twig', [
            'produits'=> $produits,
        ]);
    }
}