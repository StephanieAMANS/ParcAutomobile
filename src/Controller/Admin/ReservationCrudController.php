<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Toutes les réservations')
            ->setPageTitle('new', 'Nouvelle réservation')
            ->setPageTitle('edit', 'Modifier une réservation');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('operationCode', 'Code Opération'),
            AssociationField::new('sites', 'Site de départ'),
            TextareaField::new('comments', 'Commentaires ou précisions'),
        ];
    }

}
