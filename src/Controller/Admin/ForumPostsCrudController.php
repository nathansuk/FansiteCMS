<?php

namespace App\Controller\Admin;

use App\Entity\ForumPosts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ForumPostsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ForumPosts::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setLabel('ID du topic'),
            TextField::new('title')->setLabel('Titre'),
            TextEditorField::new('description')->setLabel('Description'),
        ];
    }
}
