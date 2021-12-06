<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Department;
use App\Entity\Region;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BidGames');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Régions', 'fas fa-map', Region::class);
        yield MenuItem::linkToCrud('Départements', 'fas fa-building', Department::class);
        yield MenuItem::linkToCrud('Villes', 'fas fa-city', City::class);
        yield MenuItem::linkToCrud('Types de produits', 'fas fa-sliders-h', Type::class);
        yield MenuItem::linkToCrud('Catégories enchères','fab fa-ideal', Category::class);
    }
}
