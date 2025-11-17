<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        //We pakken alles van de db via EntityManager
        $category = $entityManager->getRepository(Category::class)->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            //We zetten alle info van $category in 'category'
            'category' => $category,
    ]);
    }
}