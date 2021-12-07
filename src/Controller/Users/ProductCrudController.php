<?php

namespace App\Controller\Users;

use App\Entity\Product;
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


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('id_user', 'DOIT ETRE AUTO selon id connecté'),
            AssociationField::new('id_sets', 'ID du lot'),
            AssociationField::new('id_type', "Type du produit"),
            AssociationField::new('id_status', "Etat du produit"),
            TextField::new('name', 'Nom du produit'),
            TextareaField::new('description', 'Description'),
            MoneyField::new('estimate_price', 'Estimation de prix')->setCurrency('EUR'),
            MoneyField::new('reserve_price', 'Prix de réserve')->setCurrency('EUR')
        ];


    }
}
