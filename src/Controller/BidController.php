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
use Symfony\Component\HttpFoundation\Response;

class BidController extends AbstractController {


    #[Route("/bid/{id}", name:"bid")]
    public function bid(SetsRepository $setsRepository , ProductRepository $productRepository, $id)
    {
        $repo = $this->getDoctrine()->getRepository(Bid::class);

        $idSet=$setsRepository->findBy(array('id_bid' => $id));

        $idSets = [];
        foreach ($idSet as $key) {
            $idSets[] = $key->getId();
        }

        return $this->render("home/bid.html.twig", [
            'bid' => $repo->find($id),
            'sets' => $setsRepository->findBy(array('id_bid' => $id)),
            'products' => $productRepository->findBy(array('id_sets' => $idSets))
        ]);
    }
}