<?php

namespace App\Controller;

use App\Repository\BidRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllBidsController extends AbstractController
{
    /**
     * @Route("/allbids", name="bids")
     */
    public function home(BidRepository $bidRepository): Response
    {
        return $this->render('home/allbids.html.twig', [
            'bid' => $bidRepository->findAll(),
        ]);
    }
}