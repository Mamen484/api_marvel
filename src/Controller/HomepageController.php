<?php
/**
 * Created by PhpStorm.
 * User: mendy
 * Date: 08/04/19
 * Time: 08:37
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends Controller
{

    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', ['mainNavHome' => true, 'title' => 'Accueil']);
    }

}