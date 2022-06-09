<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(CategoryRepository $catRepository): Response
    {
        $categories = $catRepository->findAll();

        return $this->render('index/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
