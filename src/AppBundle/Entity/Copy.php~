<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * Copy
 *
 * @ORM\Table(name="copy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CopyRepository")
 */
class Copy
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
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article", referencedColumnName="id")
     *
     * @Assert\NotBlank(
     *      message="article should not be a blank."
     * )
     * @JMS\Groups({"default"}) 
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="copyNumber", type="string", length=255)
     *
     * @Assert\NotBlank(
     *      message="copyNumber should not be a blank."
     * )
     *
     * @Assert\Type(
     *      type="string",
     *      message="The value of copyNumber ({{ value }}) is not a valid {{ type }}."
     * )
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "copyNumber must be at least {{ limit }} characters long",
     *      maxMessage = "copyNumber cannot be longer than {{ limit }} characters"
     * )
     * @JMS\Groups({"default"})
     */
    private $copyNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedOn", type="date")
     *
     * @Assert\Date()
     * @JMS\Groups({"default"}) 
     */
    private $addedOn;

    /**
     * @var bool
     *
     * @ORM\Column(name="lost", type="boolean")
     *
     * @Assert\Type(
     *      type="boolean",
     *      message="The value of lost ({{ value }}) is not a valid {{ type }}."
     * )
     * @JMS\Groups({"default"}) 
     */
    private $lost = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="damaged", type="boolean")
     *
     * @Assert\Type(
     *      type="bool",
     *      message="The value of damaged ({{ value }}) is not a valid {{ type }}."
     * )
     * @JMS\Groups({"default"}) 
     */
    private $damaged = false;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     *
     * @JMS\Groups({"default"})
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
     */
    private $note;

    /**
     * @ORM\OneToMany(targetEntity="Loan", mappedBy="copy")
     */
    private $loans;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     *
     * @Assert\Type(
     *      type="boolean",
     *      message="The value of available ({{ value }}) is not a valid {{ type }}."
     * )
     * @JMS\Groups({"default"}) 
     */
    private $available = true;


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
     * Set copyNumber
     *
     * @param string $copyNumber
     *
     * @return Copy
     */
    public function setCopyNumber($copyNumber)
    {
        $this->copyNumber = $copyNumber;

        return $this;
    }

    /**
     * Get copyNumber
     *
     * @return string
     */
    public function getCopyNumber()
    {
        return $this->copyNumber;
    }

    /**
     * Set addedOn
     *
     * @param \DateTime $addedOn
     *
     * @return Copy
     */
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;

        return $this;
    }

    /**
     * Get addedOn
     *
     * @return \DateTime
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * Set lost
     *
     * @param boolean $lost
     *
     * @return Copy
     */
    public function setLost($lost)
    {
        $this->lost = $lost;

        return $this;
    }

    /**
     * Get lost
     *
     * @return boolean
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * Set damaged
     *
     * @param boolean $damaged
     *
     * @return Copy
     */
    public function setDamaged($damaged)
    {
        $this->damaged = $damaged;

        return $this;
    }

    /**
     * Get damaged
     *
     * @return boolean
     */
    public function getDamaged()
    {
        return $this->damaged;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Copy
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
     * Set available
     *
     * @param boolean $available
     *
     * @return Copy
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set article
     *
     * @param \AppBundle\Entity\Article $article
     *
     * @return Copy
     */
    public function setArticle(\AppBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \AppBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Add loan
     *
     * @param \AppBundle\Entity\Loan $loan
     *
     * @return Copy
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
