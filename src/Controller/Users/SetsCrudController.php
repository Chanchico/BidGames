<?php

namespace App\Controller\Users;

use App\Entity\Sets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PHPUnit\TextUI\XmlConfiguration\Logging\Text;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class SetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sets::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('id_city', 'Ville'),
            AssociationField::new('id_user_auctioneer', 'Commisaire Priseur'),
            DateTimeField::new('launch_date', "Date de début de l'enchère"),
            TextField::new('address', 'Adresse'),
            BooleanField::new('is_published', "Publier le lot"),
        ];
    }
}
