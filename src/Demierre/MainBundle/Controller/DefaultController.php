<?php

namespace Demierre\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DemierreMainBundle:Default:index.html.twig');
    }
}
