<?php

namespace App\Controller;

use App\Repository\MovieRepository;
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
    public function index(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findAll();

        dd($movies);

        return $this->render('index.html.twig');
    }
}
