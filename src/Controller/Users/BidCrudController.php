<?php

namespace App\Controller\Users;

use App\Entity\Bid;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Integer;
use PHPUnit\TextUI\XmlConfiguration\Logging\Text;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class BidCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bid::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('id_user', 'DOIT ETRE AUTO selon id connecté'),
            AssociationField::new('id_category', "Catégorie de l'enchère"),
            BooleanField::new('is_published', "Publier l'enchère"),
            ];

    }

}
