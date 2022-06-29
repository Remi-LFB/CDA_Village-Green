<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_index')]
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getCart(),
            'tva' => $cartService->getTva(),
            'total' => $cartService->getTotal()
        ]);
    }

    #[Route('/cart/add/{product}/{origin}', name: 'cart_add')]
    public function add($product, $origin, CartService $cartService): Response
    {
        $cartService->add($product);

        return $this->redirectToRoute($origin, $cartService->getPathParameter($origin, $product));
    }

    #[Route('/cart/minus/{product}', name: 'cart_minus')]
    public function minus($product, CartService $cartService): Response
    {
        $cartService->minus($product);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/cart/remove/{product}', name: 'cart_remove')]
    public function remove($product, CartService $cartService): Response
    {
        $cartService->remove($product);

        return $this->redirectToRoute('cart_index');
    }
}
