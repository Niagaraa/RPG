<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class HomeController extends AbstractController {

    /**
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

}
