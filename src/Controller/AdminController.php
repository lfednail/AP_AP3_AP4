<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PRODUITRepository;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(PRODUITRepository $produitrepository): Response
    {
        $produit = $produitrepository -> findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'produit' => $produit,
        ]);
    }
}
