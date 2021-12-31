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
     * @Route("/movies",name="movies")
     */
    public function index(): Response
    {
        // return $this->json([
        //     'message' => $name,
        //     'path' => 'src/Controller/MoviesController.php',
        // ]);

        $movies = ['Avengers: Endgame', 'The Shadow', 'ET', 'Hudson Hawk'];
        return $this->render('index.html.twig', array(
            'movies' => $movies
        ));
    }
}
