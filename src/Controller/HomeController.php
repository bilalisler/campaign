<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('base/base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
