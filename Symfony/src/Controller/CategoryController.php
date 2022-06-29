<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{category}', name: 'category_index')]
    public function index(Category $category): Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
    }
}
