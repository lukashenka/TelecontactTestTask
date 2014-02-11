<?php

namespace Telecontact\ContactBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;


class RestController extends FOSRestController
{
	public function getContactFreeAction()
	{


		$contact = $this->getDoctrine()->getRepository('TelecontactContactBundle:Contact')->getFreeContact();


		$data = array(
			'id' => $contact->getId(),
			'name' => $contact->getName(),
			'status' => $contact->getStatus()
		);
		$view = $this->view($data, 200);
		return $this->handleView($view);
	}

	public function setContactStatusAction($state)
	{

	}
}
