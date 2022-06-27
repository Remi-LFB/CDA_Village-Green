<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(CategoryRepository $categoryRepository): Response
    {
        return $this->render('index/index.html.twig', [
            'categories' => $categoryRepository->findAll()
        ]);
    }
}
