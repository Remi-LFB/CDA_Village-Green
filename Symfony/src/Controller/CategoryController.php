<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SubCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{category}', name: 'category_show')]
    public function category_show(Category $category): Response
    {
        return $this->render('category/catshow.html.twig', [
            'category' => $category
        ]);
    }

    #[Route('/subcategory/{subCategory}', name: 'subcategory_show')]
    public function subcategory_show(SubCategory $subCategory): Response
    {
        return $this->render('category/subcatshow.html.twig', [
            'subCategory' => $subCategory
        ]);
    }
}
