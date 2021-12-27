<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    // Newer method is #[Route('/movies', name: 'movies')]
    /**
     * @Route("/movies", name="movies", methods:['GET','HEAD'])
     */
    #[Route('/movies', name: 'movies')]
    public function index($name = "bob"): Response
    {
        return $this->json([
            'message' => $name,
            'path' => 'src/Controller/MoviesController.php',
        ]);
    }
}
