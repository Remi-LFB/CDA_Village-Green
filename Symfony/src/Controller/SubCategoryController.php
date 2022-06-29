<?php

namespace App\Controller;

use App\Entity\SubCategory;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubCategoryController extends AbstractController
{
    #[Route('/subcategory/{subCategory}', name: 'sub_category_index')]
    public function index(SubCategory $subCategory, CartService $cartService): Response
    {
        return $this->render('sub_category/index.html.twig', [
            'subCategory' => $subCategory,
            'cartNumberItems' => $cartService->getNumberItems()
        ]);
    }
}
