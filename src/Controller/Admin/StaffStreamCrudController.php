<?php

namespace App\Controller\Admin;

use App\Entity\StaffStream;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StaffStreamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StaffStream::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('pseudo'),
            TextField::new('rank'),
            DateField::new('date'),
            ChoiceField::new('type')->setChoices([
                'Départ' => 'QUIT',
                'Changement' => 'SWITCH',
                'Arrivée' => 'ARRIVAL'
                ]
            ),
        ];
    }

}
