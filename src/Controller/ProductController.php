<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/", name="index", methods={"POST"})
     */
    public function creaate()
    {
        $product = new Product();
        $product->setName("Primeiro Produto");
        $product->setDescription("Descrição Produto");
        $product->setContent("COnteúdo Produto");
        $product->setSlug("primeiro-produto");
        $product->setPrice(1999);
        $product->setIsActive(true);
        $product->setCreatedAt(new \DateTime("now", new \DateTimeZone('America/Sao_Paulo')));
        $product->setUpdatedAt(new \DateTime("now", new \DateTimeZone('America/Sao_Paulo')));

        return $this->json([
            'message' => 'Produto criado com sucesso!'
        ]);
    }
}
