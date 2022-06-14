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
    public function categoryShow(Category $category): Response
    {
        return $this->render('category/category.html.twig', [
            'categoryName' => $category->getName(),
            'subCategories' => $category->getSubCategories()
        ]);
    }

    #[Route('/subcategory/{subCategory}', name: 'subcategory_show')]
    public function subCategoryShow(SubCategory $subCategory): Response
    {
        return $this->render('category/subcategory.html.twig', [
            'categoryName' => $subCategory->getCategory()->getName(),
            'subCategoryName' => $subCategory->getName(),
            'products' => $subCategory->getProducts()
        ]);
    }
}
