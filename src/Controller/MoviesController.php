<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{

    // Another way of writing routes
    // #[Route('/movies', name: 'movies')]

    /**
     * @Route("/movies/{name}",name="movies", defaults={"name": "Hello movie!"}, methods={"GET","HEAD"})
     */
    public function index($name): Response
    {
        return $this->json([
            'message' => $name,
            'path' => 'src/Controller/MoviesController.php',
        ]);
    }
}
