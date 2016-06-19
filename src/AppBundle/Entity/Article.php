<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as AcmeAssert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 * @UniqueEntity("refNumber", message="This refNumber is already in use.")
 * @UniqueEntity("isbn", message="This isbn is already in use.")
 */
class Article
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Groups({"default"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="refNumber", type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(
     *      message="RefNumber should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of RefNumber ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "RefNumber must be at least {{ limit }} characters long",
     *      maxMessage = "RefNumber cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $refNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(
     *      message="ISBN should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of ISBN ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "ISBN must be at least {{ limit }} characters long",
     *      maxMessage = "ISBN cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @Assert\NotBlank(
     *      message="Title should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of Title ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Title must be at least {{ limit }} characters long",
     *      maxMessage = "Title cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of Subtitle ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Subtitle must be at least {{ limit }} characters long",
     *      maxMessage = "Subtitle cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $subtitle;

    /**
     * @var array
     *
     * @ORM\Column(name="authors", type="array")
     *
     * @JMS\Groups({"default"}) 
     */
    private $authors;

    /**
     * @var integer
     *
     * @ORM\Column(name="editionYear", type="integer", length=4, nullable=true)
     *
     * @Assert\Type(
     *      type="integer",
     *      message="The value of EditionYear ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 4,
     *      max = 4,
     *      minMessage = "EditionYear must be at least {{ limit }} characters long",
     *      maxMessage = "EditionYear cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $editionYear;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     *
     * @Assert\NotBlank(
     *      message="Publisher should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of Publisher ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Publisher must be at least {{ limit }} characters long",
     *      maxMessage = "Publisher cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"})
     */
    private $publisher;

    /**
     * @var string
     * @ORM\Column(name="legalDeposit", type="string", length=255, nullable=true)
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of legalDeposit ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "legalDeposit must be at least {{ limit }} characters long",
     *      maxMessage = "legalDeposit cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $legalDeposit;

    /**
     * @ORM\ManyToOne(targetEntity="CDU")
     * @ORM\JoinColumn(name="cdu", referencedColumnName="id")
     *
     * @Assert\NotBlank(
     *      message="CDU should not be a blank."
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $cdu;

//    /**
//     * @var \AppBundle\Types\ClassTypes\Signature
//     *
//     * @ORM\Column(name="signature", type="signature")
//     *
//     * @Assert\NotBlank(
//     *      message="Signature should not be a blank."
//     * )
//     *
//     * @AcmeAssert\ContainsSignature
//     */
//    private $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of Location ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Location must be at least {{ limit }} characters long",
     *      maxMessage = "Location cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     *
     * @Assert\NotBlank(
     *      message="category should not be a blank."
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=500, nullable=true)
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of Note ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 500,
     *      minMessage = "Note must be at least {{ limit }} characters long",
     *      maxMessage = "Note cannot be longer than {{ limit }} characters"
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $note;

     /**
     * @var bool
     *
     * @ORM\Column(name="loanable", type="boolean")
     *
     * @Assert\Type(
     *      type="boolean",
     *      message="The value of Loanable ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @JMS\Groups({"default"}) 
     */
    private $loanable = true;


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
     * Set refNumber
     *
     * @param string $refNumber
     *
     * @return Article
     */
    public function setRefNumber($refNumber)
    {
        $this->refNumber = $refNumber;

        return $this;
    }

    /**
     * Get refNumber
     *
     * @return string
     */
    public function getRefNumber()
    {
        return $this->refNumber;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     *
     * @return Article
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return Article
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set authors
     *
     * @param array $authors
     *
     * @return Article
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return array
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set editionYear
     *
     * @param integer $editionYear
     *
     * @return Article
     */
    public function setEditionYear($editionYear)
    {
        $this->editionYear = $editionYear;

        return $this;
    }

    /**
     * Get editionYear
     *
     * @return integer
     */
    public function getEditionYear()
    {
        return $this->editionYear;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Article
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set legalDeposit
     *
     * @param string $legalDeposit
     *
     * @return Article
     */
    public function setLegalDeposit($legalDeposit)
    {
        $this->legalDeposit = $legalDeposit;

        return $this;
    }

    /**
     * Get legalDeposit
     *
     * @return string
     */
    public function getLegalDeposit()
    {
        return $this->legalDeposit;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Article
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Article
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set loanable
     *
     * @param boolean $loanable
     *
     * @return Article
     */
    public function setLoanable($loanable)
    {
        $this->loanable = $loanable;

        return $this;
    }

    /**
     * Get loanable
     *
     * @return boolean
     */
    public function getLoanable()
    {
        return $this->loanable;
    }

    /**
     * Set cdu
     *
     * @param \AppBundle\Entity\CDU $cdu
     *
     * @return Article
     */
    public function setCdu(\AppBundle\Entity\CDU $cdu = null)
    {
        $this->cdu = $cdu;

        return $this;
    }

    /**
     * Get cdu
     *
     * @return \AppBundle\Entity\CDU
     */
    public function getCdu()
    {
        return $this->cdu;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Article
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
