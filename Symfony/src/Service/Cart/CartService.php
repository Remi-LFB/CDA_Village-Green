<?php

namespace App\Service\Cart;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    protected SessionInterface $session;
    protected ProductRepository $productRepository;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function getCart(): array
    {
        $cart = $this->session->get('cart', []);

        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $quantity,
                'total' => $this->productRepository->find($id)->getPrice() * $quantity
            ];
        }

        return $cartWithData;
    }

    public function add(int $id): void
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id])) {
            $cart[$id]++;
        }
        else {
            $cart[$id] = 1;
        }

        $this->session->set('cart', $cart);
    }

    public function minus(int $id): void
    {
        $cart = $this->session->get('cart', []);

        if ($cart[$id] > 1) {
            $cart[$id]--;
        }
        else {
            unset($cart[$id]);
        }

        $this->session->set('cart', $cart);
    }

    public function getPathParameter(string $origin, int $id): array
    {
        $parameter = [];

        if ($origin == 'product_show') {
            $parameter = [
                'product' => $id
            ];
        } else if ($origin == 'subcategory_show') {
            $parameter = [
                'subCategory' => $this->productRepository->find($id)->getSubCategory()->getId()
            ];
        }

        return $parameter;
    }

    public function remove(int $id): void
    {
        $cart = $this->session->get('cart', []);

        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }

        $this->session->set('cart', $cart);
    }

    public function getTva(): float
    {
        $tva = 0;

        foreach ($this->getCart() as $item) {
            $tva += ($item['product']->getPrice() * 0.2) * $item['quantity'];
        }

        return $tva;
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->getCart() as $item) {
            $total += ($item['product']->getPrice() * 1.2) * $item['quantity'];
        }

        return $total;
    }
}
