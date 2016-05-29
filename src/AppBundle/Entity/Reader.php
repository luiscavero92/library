<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reader
 *
 * @ORM\Table(name="Reader")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReaderRepository")
 */
class Reader
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="recordNumber", type="string", length=255, unique=true)
     */
    private $recordNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=9)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true, unique=true)
     */
    private $photo;

    /**
     * @var bool
     *
     * @ORM\Column(name="denied", type="boolean")
     */
    private $denied = false;

    /**
     * @ORM\OneToMany(targetEntity="Loan", mappedBy="reader")
     */
    private $loans;



    public function __construct() {
        $this->loans = new ArrayCollection();
    }

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
     * Set recordNumber
     *
     * @param string $recordNumber
     *
     * @return Reader
     */
    public function setRecordNumber($recordNumber)
    {
        $this->recordNumber = $recordNumber;

        return $this;
    }

    /**
     * Get recordNumber
     *
     * @return string
     */
    public function getRecordNumber()
    {
        return $this->recordNumber;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Reader
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Reader
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Reader
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Reader
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Reader
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Reader
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set denied
     *
     * @param boolean $denied
     *
     * @return Reader
     */
    public function setDenied($denied)
    {
        $this->denied = $denied;

        return $this;
    }

    /**
     * Get denied
     *
     * @return boolean
     */
    public function getDenied()
    {
        return $this->denied;
    }

    /**
     * Add loan
     *
     * @param \AppBundle\Entity\Loan $loan
     *
     * @return Reader
     */
    public function addLoan(\AppBundle\Entity\Loan $loan)
    {
        $this->loans[] = $loan;

        return $this;
    }

    /**
     * Remove loan
     *
     * @param \AppBundle\Entity\Loan $loan
     */
    public function removeLoan(\AppBundle\Entity\Loan $loan)
    {
        $this->loans->removeElement($loan);
    }

    /**
     * Get loans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLoans()
    {
        return $this->loans;
    }
}
