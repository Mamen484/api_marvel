<?php
/**
 * Created by PhpStorm.
 * User: mendy
 * Date: 08/04/19
 * Time: 08:36
 */
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin") */
class HomepageController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('admin/homepage/index.html.twig', ['mainNavAdmin' => true, 'title' => 'Espace admin']);
    }

}