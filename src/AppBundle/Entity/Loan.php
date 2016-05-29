<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loan
 *
 * @ORM\Table(name="loan")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LoanRepository")
 */
class Loan
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
     * @ORM\ManyToOne(targetEntity="Reader", inversedBy="loans")
     * @ORM\JoinColumn(name="reader_id", referencedColumnName="id")
     */
    private $reader;

    /**
     * @ORM\ManyToOne(targetEntity="Copy", inversedBy="loans")
     * @ORM\JoinColumn(name="copy_id", referencedColumnName="id")
     */
    private $copy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="loanDate", type="date")
     */
    private $loanDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="returnDate", type="date", nullable=true)
     */
    private $returnDate = null;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set loanDate
     *
     * @param \DateTime $loanDate
     *
     * @return Loan
     */
    public function setLoanDate($loanDate)
    {
        $this->loanDate = $loanDate;

        return $this;
    }

    /**
     * Get loanDate
     *
     * @return \DateTime
     */
    public function getLoanDate()
    {
        return $this->loanDate;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     *
     * @return Loan
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * Set reader
     *
     * @param \AppBundle\Entity\Reader $reader
     *
     * @return Loan
     */
    public function setReader(\AppBundle\Entity\Reader $reader = null)
    {
        $this->reader = $reader;

        return $this;
    }

    /**
     * Get reader
     *
     * @return \AppBundle\Entity\Reader
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * Set copy
     *
     * @param \AppBundle\Entity\Copy $copy
     *
     * @return Loan
     */
    public function setCopy(\AppBundle\Entity\Copy $copy = null)
    {
        $this->copy = $copy;

        return $this;
    }

    /**
     * Get copy
     *
     * @return \AppBundle\Entity\Copy
     */
    public function getCopy()
    {
        return $this->copy;
    }
}
