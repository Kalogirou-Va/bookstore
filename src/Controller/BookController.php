<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }

    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Book::class);
        $books = $repository->findAll();
        
    
        
        return $this->render('app/books.html.twig', [
            'books'=>$books
        ]);
    }
}
