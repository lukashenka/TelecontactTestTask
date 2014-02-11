<?php

namespace Telecontact\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
	public function listAction()
	{

		$contacts = $this->getDoctrine()->getRepository('TelecontactContactBundle:Contact')->findAll();
		return $this->render('TelecontactContactBundle:Contact:list.html.twig', array('contacts' => $contacts));
	}
}
