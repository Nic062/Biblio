<?php

namespace Biblio\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Emprunt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="delais", type="smallint")
     */
    private $delais;
	
	/**
	* @ORM\ManyToOne(targetEntity="Biblio\UserBundle\Entity\User", inversedBy="emprunts")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $inscrit;
	
	/**
	* @ORM\OneToOne(targetEntity="Biblio\GeneralBundle\Entity\Exemplaire", inversedBy="emprunt")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $exemplaire;
	
	
	public function __construct(){
		$this->date = new \Datetime();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Emprunt
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set delais
     *
     * @param integer $delais
     * @return Emprunt
     */
    public function setDelais($delais)
    {
        $this->delais = $delais;
    
        return $this;
    }

    /**
     * Get delais
     *
     * @return integer 
     */
    public function getDelais()
    {
        return $this->delais;
    }

    /**
     * Set inscrit
     *
     * @param \Biblio\UserBundle\Entity\User $inscrit
     * @return Emprunt
     */
    public function setInscrit(\Biblio\UserBundle\Entity\User $inscrit)
    {
        $this->inscrit = $inscrit;
    
        return $this;
    }

    /**
     * Get inscrit
     *
     * @return \Biblio\UserBundle\Entity\User
     */
    public function getInscrit()
    {
        return $this->inscrit;
    }

    /**
     * Set exemplaire
     *
     * @param \Biblio\GeneralBundle\Entity\Exemplaire $exemplaire
     * @return Emprunt
     */
    public function setExemplaire(\Biblio\GeneralBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaire = $exemplaire;
		
		$exemplaire->setEmprunt($this);
    
        return $this;
    }

    /**
     * Get exemplaire
     *
     * @return \Biblio\GeneralBundle\Entity\Exemplaire 
     */
    public function getExemplaire()
    {
        return $this->exemplaire;
    }
}
