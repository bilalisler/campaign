<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("has_role('ROLE_SHOP')")
 *
 * @Route("/shop")
 *
 * Class ShopManagementController
 * @package App\Controller
 */
class ShopManagementController extends AbstractController
{
    /**
     * @Route("/", name="shop_home")
     */
    public function index()
    {
        return $this->render('shop_management/index.html.twig', [
            'controller_name' => 'ShopManagementController',
        ]);
    }
}
