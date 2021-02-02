<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Menu;

class MenuController extends AbstractController
{

    //This controller will be embedded into a template
    // This is not a good things to do due to lack of performance.
    public function getMenu(): Response {
        $menu = $this->getDoctrine()->getRepository(Menu::class)->findAll();
        return $this->render('menu/menu_list.html.twig', [
            'menu' => $menu
        ]);

    }

}