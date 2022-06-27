<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_show')]
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        $cart = $session->get('cart', []);

        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity,
                'total' => $productRepository->find($id)->getPrice() * $quantity
            ];
        }

        $total = 0;
        $tva = 0;

        foreach ($cartWithData as $item) {
            $totalItem = ($item['product']->getPrice() * 1.2) * $item['quantity'];
            $tvaItem = ($totalItem / 100) * 20;

            $total += $totalItem;
            $tva += $tvaItem;
    }

        return $this->render('cart/index.html.twig', [
            'items' => $cartWithData,
            'tva' => $tva,
            'total' => $total
        ]);
    }

    #[Route('/cart/add/{product}', name: 'cart_add')]
    public function add($product, SessionInterface $session)
    {
        $cart = $session->get('cart', []);

        if (!empty($cart[$product])) {
            $cart[$product]++;
        }
        else {
            $cart[$product] = 1;
        }

        $session->set('cart', $cart);
    }
}
