<?php

namespace Telecontact\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Telecontact\ContactBundle\Entity\ContactRepository")
 */
class Contact
{

	const FREE = 0;
	const CLOSED = 1;
	const BUSY = 2;
	const NO_ANSWER = 3;
	const CALLBACK_LATER = 4;
	const DENIED = 5;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="status", type="smallint")
	 */
	private $status;


	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="locked", type="boolean")
	 *
	 */
	private $locked = 0;

	/**
	 * @var datetime
	 *
	 * @ORM\Column(name="updated",type="datetime")
	 */
	private $updated;


	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Contact
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set status
	 *
	 * @param integer $status
	 * @return Contact
	 */
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get status
	 *
	 * @return string
	 */

	public function getStatus()
	{
		return $this->status;
	}

	public function getStatusString()
	{
		switch ($this->getStatus()) {
			case Contact::BUSY:
			{
				return "Занят";

			}

			case Contact::NO_ANSWER:
			{
				return "Нет ответа";
			}
			case Contact::CALLBACK_LATER:
			{
				return "Просили перезвонить";
			}
			case Contact::CLOSED:
			{
				return "Закрыт";
			}
			case Contact::DENIED:
			{
				return "Отказано";
			}
			case Contact::FREE:
			{
				return "Свободен";
			}
		}
	}

	public function setUpdated(\DateTime $time)
	{
		$this->updated = $time;
	}

	public function getUpdated()
	{


		return $this->updated;
	}

	public function setLocked($state)
	{
		$this->locked = $state;
	}

	public function getLocked()
	{
		return (boolean)($this->locked);
	}

	public function isLocked()
	{

		return $this->getLocked();

	}


}
