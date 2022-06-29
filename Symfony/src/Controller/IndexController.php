<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository, CartService $cartService): Response
    {
        return $this->render('index/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'cartNumberItems' => $cartService->getNumberItems()
        ]);
    }
}
