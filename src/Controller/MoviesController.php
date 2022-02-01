<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{

    private $movieRepository;
    // private $em;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    // public function __construct(EntityManagerInterface $em)
    // {
    //     $this->em = $em;
    // }

    /**
     * @Route("/movies",name="movies")
     */
    public function index(): Response
    {

        $movies = $this->movieRepository->findAll();

        // return $this->render('index.html.twig');
        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }
}
