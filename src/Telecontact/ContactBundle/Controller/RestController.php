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


	public function postContactStatusAction()
	{

		$id = $this->getRequest()->request->get('id');
		$state = $this->getRequest()->request->get('locked');


		$responseStatus = rand(1, 5);

		$em = $this->getDoctrine()->getManager();
		$contact = $this->getDoctrine()->getRepository("TelecontactContactBundle:Contact")->findById($id);

		$contact->setLocked($state);
		$contact->setStatus($responseStatus);
		$em->persist($contact);
		$em->flush();


		$response = array('contact_response' => $responseStatus);

		$response = $this->view($response, 200);
		return $this->handleView($response);
	}
}
