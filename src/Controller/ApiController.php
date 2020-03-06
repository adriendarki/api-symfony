<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{

    # partie front à dev si on ne veux pas tomber sur la page de base
    /**
     * @Route("/", name="home")
     */
    public function Index(){
        return $this->render('/base.html.twig');
    }

}