<?php

namespace App\Controller\Admin;

use App\Entity\ForumPosts;
use App\Entity\Menu;
use App\Entity\News;
use App\Entity\Rank;
use App\Entity\Room;
use App\Entity\StaffStream;
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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::section('Apparence', 'angle-right');
        yield MenuItem::linkToCrud('Menu', 'fas fa-list-ol', Menu::class);
        yield MenuItem::section('Communauté', 'fas fa-users');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Ranks', 'fas fa-user', Rank::class);
        yield MenuItem::section('Contenu', 'angle-right');
        yield MenuItem::linkToCrud('Forum', 'fas fa-paragraph', ForumPosts::class);
        yield MenuItem::linkToCrud('Articles', 'fas fa-newspaper', News::class);
        yield MenuItem::linkToCrud('Appartements', 'fas fa-layer-group', Room::class);
        yield MenuItem::linkToCrud('Flux City', 'fas fa-arrow-up', StaffStream::class);
    }


}
