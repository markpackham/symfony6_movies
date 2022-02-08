<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieFormType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


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
     * @Route("/movies", methods={"GET"}, name="movies")
     */
    public function index(): Response
    {

        $movies = $this->movieRepository->findAll();

        // return $this->render('index.html.twig');
        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }


    /**
     * @Route("/movies/create", name="create_movie")
     */
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class, $movie);

        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            $newMovie = $form->getData();

            $imagePath = $form->get('imagePath')->getData();

            if ($imagePath) {
                $newFileName = uniqid() . '.' . $imagePath->guessExtension();

                try {
                    $imagePath->move(
                        $this->getParameter('kernal.project_dit') . '/public/uploads',
                        $newFileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $newMovie->setImagePath('/uploads/' . $newFileName);
            }
        }

        return $this->render('movies/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/movies/{id}", methods={"GET"}, name="show")
     */
    public function show($id): Response
    {

        $movie = $this->movieRepository->find($id);

        // return $this->render('index.html.twig');
        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }
}
