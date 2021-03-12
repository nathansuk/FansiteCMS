<?php

namespace App\Controller\Admin;

use App\Entity\Rank;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RankCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rank::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Titre du rank'),
            TextField::new('image')->setLabel('Image page staff')
        ];
    }

}
