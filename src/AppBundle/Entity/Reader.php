<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Reader
 *
 * @ORM\Table(name="Reader")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReaderRepository")
 * @UniqueEntity("recordNumber", message="This recordNumber is already in use.")
 * @UniqueEntity("email", message="This email is already in use.")
 */
class Reader
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Groups({"default"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="recordNumber", type="string", length=255, unique=true)
     * @Assert\NotBlank(
     *      message="recordNumber should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of recordNumber ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "recordNumber must be at least {{ limit }} characters long",
     *      maxMessage = "recordNumber cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $recordNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=9)
     *
     * @Assert\NotBlank(
     *      message="nif should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of nif ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 9,
     *      max = 9,
     *      minMessage = "nif must be at least {{ limit }} characters long",
     *      maxMessage = "nif cannot be longer than {{ limit }} characters"
     * )
     *
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     * @Assert\NotBlank(
     *      message="firstName should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of firstName ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "firstName must be at least {{ limit }} characters long",
     *      maxMessage = "firstName cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @Assert\NotBlank(
     *      message="lastName should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of lastName ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "lastName must be at least {{ limit }} characters long",
     *      maxMessage = "lastName cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
     * @Assert\NotBlank(
     *      message="email should not be a blank."
     * )
     *
     * @Assert\Email()
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "email must be at least {{ limit }} characters long",
     *      maxMessage = "email cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     * @Assert\NotBlank(
     *      message="phone should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of phone ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 9,
     *      max = 15,
     *      minMessage = "phone must be at least {{ limit }} characters long",
     *      maxMessage = "phone cannot be longer than {{ limit }} characters"
     * )
     *
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
