<?php

namespace Telecontact\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		$freeContacts = $this->getDoctrine()->getRepository('TelecontactContactBundle:Contact')->getFreeContactsCount();
		return $this->render('TelecontactContactBundle:Default:index.html.twig',
			array('freeContacts' => $freeContacts)
		);
	}
}
