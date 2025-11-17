<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $products = $entityManager->getRepository(Products::class)->findAll();
        return $this->render('products/index.html.twig', [
            'products' =>$products,
            'controller_name' => 'ProductsController',
        ]);
    }
    #[Route('/products/{id}', name: 'app_products_details')]
    public function show(Products $products): Response
    {
        //$products is now filled with the Entity Products
        return $this->render('products/details.html.twig', [
            'controller_name' => 'ProductsController',
            'Products' => $products,
        ]);
    }

    #[Route('/product/{id}', name: 'app_cat_product')]
    public function showPizza(EntityManagerInterface $em, int $id): Response
    {
        //We pakken alles van de db via EntityManager
        $categories = $em->getRepository(Category::class)->find($id);
        $products = $categories->getProducts();

        return $this->render('products/cat-products.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
