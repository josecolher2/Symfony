<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController
{
    #[Route('/', name: 'app_inici')]
    public function index(){
        return new Response("Gestió d'equips del projecte 2n de DAW");
    }
    #[Route('/inici', name: 'index_normal')]
    public function index_normal(){
        return new Response("Gestió d'equips del projecte 2n de DAW");
    }
}
