<?php

namespace Telecontact\ContactBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;


class RestController extends FOSRestController
{


	public function getContactFreeCountAction()
	{

		$count = $this->getDoctrine()->getRepository('TelecontactContactBundle:Contact')->getFreeContactsCount();

		$data = array('count' => $count);

		$view = $this->view($data, 200);
		return $this->handleView($view);
	}

	public function getContactFreeAction()
	{

		$em = $this->getDoctrine()->getManager();
		$contact = $this->getDoctrine()->getRepository('TelecontactContactBundle:Contact')->getFreeContact();


		$data = array(
			'id' => $contact->getId(),
			'name' => $contact->getName(),
			'status' => $contact->getStatus()
		);

		$contact->setLocked(true);

		$em->persist($contact);
		$em->flush();

		$view = $this->view($data, 200);
		return $this->handleView($view);
	}


	public function postContactStatusAction()
	{

		$id = (int)$this->getRequest()->request->get('id');
		$state = $this->getRequest()->request->get('locked');


		$responseStatus = rand(1, 5);

		$em = $this->getDoctrine()->getManager();
		$contact = $this->getDoctrine()->getRepository("TelecontactContactBundle:Contact")->findOneById($id);

		$contact->setLocked($state);
		$contact->setStatus($responseStatus);

		$contact->setUpdated(new \DateTime('now'));


		$response = array('contact_response' => $contact->getStatus());

		$em->persist($contact);
		$em->flush();

		$response = $this->view($response, 200);
		return $this->handleView($response);
	}
}
