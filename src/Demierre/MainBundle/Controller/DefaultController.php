<?php

namespace Demierre\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$userId = $this->get ( 'security.context' )->getToken ()->getUser ()->getId ();
    	$paginator = $this->get ( 'knp_paginator' );
    	$messagerepo = $this->getDoctrine ()->getRepository ( 'DemierreMainBundle:Message' );
    	$messages = $paginator->paginate ( $messagerepo->findByUnreadAndRecipientQuery ( $userId ), $this->get ( 'request' )->query->get ( 'page', 1 ), 15 );
			
        return $this->render('DemierreMainBundle:Default:index.html.twig', array('messages' => $messages));
    }
}