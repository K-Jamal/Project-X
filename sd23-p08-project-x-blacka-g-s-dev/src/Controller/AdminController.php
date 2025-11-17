<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Products;
use App\Entity\User;
use App\Form\CategoryType;
use App\Form\ProductsType;
use App\Form\RegistrationFormType;
use Cassandra\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        //Ophalen van alle boeken
        $products = $entityManager->getRepository(Products::class)->findAll();
        $categories = $entityManager->getRepository(Category::class)->findAll();
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'products' =>$products,
            'categories' =>$categories,
            'users'=>$users
        ]);
    }

    #[Route('/admin/create_product', name: 'app_admin_create_product')]
    public function create(Request $request, EntityManagerInterface $entityManager,
//                           SluggerInterface $slugger,
//                           #[Autowire('sd23-p08-project-x-blacka-g-s/assets/img')] string $imgDirectory
    ): Response
    {


        $form = $this->createForm(ProductsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Hier komt de afhandeling van het formulier in
            //Ophalen van alle producten

//            $imgFile = $form->get('image')->getData();
//
//            if ($brochureFile) {
//                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
//                // this is needed to safely include the file name as part of the URL
//                $safeFilename = $slugger->slug($originalFilename);
//                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
//
//                // Move the file to the directory where brochures are stored
//                try {
//                    $brochureFile->move($brochuresDirectory, $newFilename);
//                } catch (FileException $e) {
//                    // ... handle exception if something happens during file upload
//                }


            $products= $form->getData();
            //We bereiden de database voor om de nieuwe product op te slaan
            $entityManager->persist($products);
            //We voeren de voorbereide statements uit
            $entityManager->flush();
            $this->addFlash('success', 'product is aangepast');

            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/create.html.twig', [
            'controller_name' => 'AdminController',
            'form'=> $form,

        ]);
    }


    #[Route('/admin/create_category', name: 'app_admin_create_category')]
    public function createCategory(Request $request, EntityManagerInterface $entityManager): Response
    {


        $form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //Hier komt de afhandeling van het formulier in
            //Ophalen van alle producten
            $category= $form->getData();
            //We bereiden de database voor om de nieuwe product op te slaan
            $entityManager->persist($category);
            //We voeren de voorbereide statements uit
            $entityManager->flush();
            return $this->redirectToRoute('app_admin');
        }
        return $this->render('admin/create.html.twig', [
            'controller_name' => 'AdminController',
            'form'=> $form,

        ]);
    }
//    #[Route('/admin/edit-user/{id}', name: 'app_admin_update_user')]
//    public function editUser(EntityManagerInterface $entityManager, Request $request, User $user): Response
//    {
//        //De regel Book $book in de edit functie hierboven zorgt ervoor dat het juiste boek welke meegestuurd wordt
//        //in de variabele gezet wordt van $book
//
//        //Onderstaande code haalt het formulier op (BookType) en vult deze data met die van de entity App\Entity\Book.
//        $form = $this->createForm(RegistrationFormType::class, $user);
//
//        //We handelen de request af (deze kijkt of het formulier verstuurd is)
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            //We bereiden de database statement voor om het boek aan te passen
//            $entityManager->persist($user);
//
//            //We zorgen dat de update statemenet in de database gedraaid wordt.
//            $entityManager->flush();
//
//            //Uiteraard zetten we een flash-message
//            $this->addFlash('success', 'product is aangepast');
//
//            //We maken een redirect naar de route om het aangepaste boek te tonen
////            return $this->redirectToRoute('app_product_show', ['Products' => $products->getId()]);
//            return $this->redirectToRoute('app_admin');
//        }
//
//        //Als het formulier niet verstuurd is of ongeldig is tonen we de update pagina
//        return $this->render('admin/create.html.twig', compact('user', 'form'));
//    }

    #[Route('/admin/edit-product/{id}', name: 'app_admin_update')]
    public function edit(EntityManagerInterface $entityManager, Request $request, Products $products): Response
    {
        //De regel Book $book in de edit functie hierboven zorgt ervoor dat het juiste boek welke meegestuurd wordt
        //in de variabele gezet wordt van $book

        //Onderstaande code haalt het formulier op (BookType) en vult deze data met die van de entity App\Entity\Book.
        $form = $this->createForm(ProductsType::class, $products);

        //We handelen de request af (deze kijkt of het formulier verstuurd is)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //We bereiden de database statement voor om het boek aan te passen
            $entityManager->persist($products);

            //We zorgen dat de update statemenet in de database gedraaid wordt.
            $entityManager->flush();

            //Uiteraard zetten we een flash-message
            $this->addFlash('success', 'product is aangepast');

            //We maken een redirect naar de route om het aangepaste boek te tonen
//            return $this->redirectToRoute('app_product_show', ['Products' => $products->getId()]);
            return $this->redirectToRoute('app_admin');
        }

        //Als het formulier niet verstuurd is of ongeldig is tonen we de update pagina
        return $this->render('admin/create.html.twig', compact('products', 'form'));
    }
    #[Route('/admin/edit-Cat/{id}', name: 'app_admin_update_cat')]
    public function editCat(EntityManagerInterface $entityManager, Request $request, Category $category): Response
    {
        //De regel Book $book in de edit functie hierboven zorgt ervoor dat het juiste boek welke meegestuurd wordt
        //in de variabele gezet wordt van $book

        //Onderstaande code haalt het formulier op (BookType) en vult deze data met die van de entity App\Entity\Book.
        $form = $this->createForm(CategoryType::class, $category);

        //We handelen de request af (deze kijkt of het formulier verstuurd is)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //We bereiden de database statement voor om het boek aan te passen
            $entityManager->persist($category);

            //We zorgen dat de update statemenet in de database gedraaid wordt.
            $entityManager->flush();

            //Uiteraard zetten we een flash-message
            $this->addFlash('success', 'Category is aangepast');

//
            return $this->redirectToRoute('app_admin');
        }

        //Als het formulier niet verstuurd is of ongeldig is tonen we de update pagina
        return $this->render('admin/create.html.twig', compact('category', 'form'));
    }

    #[Route('/admin/show-product/{id}', name: 'app_admin_details')]
    public function show(Products $products): Response
    {
        //$products is now filled with the Entity Products
        return $this->render('admin/details.html.twig', [
            'controller_name' => 'AdminController',
            'Products' => $products,
        ]);
    }

    #[Route('/admin/delete-product/{id}', name: 'app_product_delete')]
    public function delete(EntityManagerInterface $entityManager, Products $products): Response {
        //We bereiden het wissen voor in de database
        $entityManager->remove($products);

        //We voeren de statements uit (het wordt nog gedelete)
        $entityManager->flush();

        //Uiteraard zetten we een flash-message
        $this->addFlash('success', 'Product is gewist');

        //We maken een redirect naar de route om het aangepaste boek te tonen
        return $this->redirectToRoute('app_admin');
    }

    #[Route('/admin/delete-user/{id}', name: 'app_user_delete')]
    public function deleteUser(EntityManagerInterface $entityManager, User $user): Response {
        //We bereiden het wissen voor in de database
        $entityManager->remove($user);

        //We voeren de statements uit (het wordt nog gedelete)
        $entityManager->flush();

        //Uiteraard zetten we een flash-message
        $this->addFlash('success', 'user is gewist');

        //We maken een redirect naar de route om het aangepaste boek te tonen
        return $this->redirectToRoute('app_admin');
    }

    #[Route('/admin/delete-cat/{id}', name: 'app_category_delete')]
    public function deleteCategory(EntityManagerInterface $entityManager, Category $category): Response {
        //We bereiden het wissen voor in de database
        $entityManager->remove($category);

        //We voeren de statements uit (het wordt nog gedelete)
        $entityManager->flush();

        //Uiteraard zetten we een flash-message
        $this->addFlash('success', 'Category+ is gewist');

        //We maken een redirect naar de route om het aangepaste boek te tonen
        return $this->redirectToRoute('app_admin');
    }
}
