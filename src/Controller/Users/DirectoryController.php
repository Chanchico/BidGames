<?php
namespace App\Controller\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;

class DirectoryController extends AbstractController{
    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function commissaire(UserRepository $repository){
        $users = $repository -> findAll();
        $commissaires = [];
        foreach ($users as $commissairef){
            if ($commissairef->getLicence()){ 
                array_push($commissaires, $commissairef);
            }
        }
        return $this->render('user/directory.html.twig',[
           'commissaires' => $commissaires
        ]); 
    }
}   