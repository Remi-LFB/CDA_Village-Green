<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\Product\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{product}', name: 'product_index')]
    public function index(Product $product): Response
    {
        return $this->render('product/index.html.twig', [
            'product' => $product
        ]);
    }
}
