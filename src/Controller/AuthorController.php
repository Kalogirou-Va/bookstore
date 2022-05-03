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
    public function authors(): Response
    {
        $repository = $this->em->getRepository(Author::class);
        $authors = $repository->findAll();
        
        return $this->render('app/authors.html.twig', [
            'authors'=>$authors
        ]);
    }

    #[Route('/author/{id}', name: 'app_author_page')]
    public function author($id): Response
    {
        $repository = $this->em->getRepository(Author::class);
        $author = $repository->find($id);
        
 

        return $this->render('app/author.html.twig', [
            'author'=>$author
        ]);
    }
}
