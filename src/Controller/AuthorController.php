<?php

namespace App\Controller;

use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Author::class);
        $authors = $repository->findAll();
        
        dd($authors);
        exit();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthorController.php',
        ]);
    }
}
