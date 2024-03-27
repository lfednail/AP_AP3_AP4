<?php
// SocialController.php

namespace App\Controller;

use App\Repository\SocialLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocialController extends AbstractController
{
    
    #[Route("/social", name:"app_social")]
    
    public function index(SocialLinkRepository $socialLinkRepository): Response
    {
        $socialLinks = $socialLinkRepository->findAll();

        return $this->render('social/social.html.twig', [
            'socialLinks' => $socialLinks,
        ]);
    }
}
