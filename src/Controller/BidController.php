<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Bid;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\SetsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BidController extends AbstractController {


    #[Route("/bid/{id}", name:"bid")]
    public function bid(SetsRepository $setsRepository , ProductRepository $productRepository, $id)
    {
        $repo = $this->getDoctrine()->getRepository(Bid::class);

        return $this->render("home/bid.html.twig", [
            'products' => $productRepository->findBy(array('bid' => $id)),
            'bid' => $repo->find($id)
        ]);
    }
}