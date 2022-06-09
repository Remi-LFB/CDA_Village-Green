<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'category_show')]
    public function index(CategoryRepository $catRepository, SubCategoryRepository $subCatRepository, $id): Response
    {
        $category = $catRepository->find($id);
        $subCategories = $subCatRepository->findBy(['category' => $id]);

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'subCategories' => $subCategories
        ]);
    }
}
