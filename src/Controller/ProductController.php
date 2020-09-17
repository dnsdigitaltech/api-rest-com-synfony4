<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/products", name="products_")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $productData = $request->request->all();

        $product = new Product();
        $product->setName($productData['name']);
        $product->setDescription($productData['description']);
        $product->setContent($productData['content']);
        $product->setSlug($productData['slug']);
        $product->setPrice($productData['price']);
        $product->setIsActive(true);
        $product->setCreatedAt(new \DateTime("now", new \DateTimeZone('America/Sao_Paulo')));
        $product->setUpdatedAt(new \DateTime("now", new \DateTimeZone('America/Sao_Paulo')));

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($product);
        $doctrine->flush();

        return $this->json([
            'message' => 'Produto criado com sucesso!'
        ]);
    }

    
}
