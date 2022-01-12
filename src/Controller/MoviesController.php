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

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/movies",name="movies")
     */
    public function index(): Response
    {

        // findAll() - SELECT * FROM movies;
        // find() - SELECT * FROM movies WHERE id = 7;
        // findBy() - SELECY * FROM movies ORDER BY id DESC

        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->findBy([], ['id' => 'DESC']);

        dd($movies);

        return $this->render('index.html.twig');
    }
}
