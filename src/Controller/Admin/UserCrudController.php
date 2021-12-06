<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PHPUnit\TextUI\XmlConfiguration\Logging\Text;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname', 'Nom'),
            TextField::new('lastname', 'Prénom'),
            ArrayField::new('Roles', 'Rôle'),
            DateField::new('birthdate', 'Date de naissance'),
            TextField::new('email', 'E-mail'),
            TextField::new('password')->setFormType(PasswordType::class)->hideOnForm(),
            TextField::new('address', 'Adresse'),
            IntegerField::new('licence', 'Licence'),
            AssociationField::new('id_city', 'Ville')
        ];
    }
}
