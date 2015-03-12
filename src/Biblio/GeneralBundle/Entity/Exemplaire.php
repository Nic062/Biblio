<?php

namespace Biblio\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exemplaire
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Exemplaire
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
	* @ORM\ManyToOne(targetEntity="Biblio\GeneralBundle\Entity\Edition", inversedBy="exemplaires")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $edition;
	
	/**
	* @ORM\ManyToOne(targetEntity="Biblio\GeneralBundle\Entity\Livre", inversedBy="exemplaires")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $livre;

	/**
	* @ORM\OneToOne(targetEntity="Biblio\GeneralBundle\Entity\Emprunt", mappedBy="exemplaire")
	*/
	private $emprunt;


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
     * Set edition
     *
     * @param \Biblio\GeneralBundle\Entity\Edition $edition
     * @return Exemplaire
     */
    public function setEdition(\Biblio\GeneralBundle\Entity\Edition $edition)
    {
        $this->edition = $edition;
		
		$edition->addExemplaire($this);
    
        return $this;
    }

    /**
     * Get edition
     *
     * @return \Biblio\GeneralBundle\Entity\Edition 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set livre
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $livre
     * @return Exemplaire
     */
    public function setLivre(\Biblio\GeneralBundle\Entity\Livre $livre)
    {
        $this->livre = $livre;
    
        return $this;
    }

    /**
     * Get livre
     *
     * @return \Biblio\GeneralBundle\Entity\Livre 
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set emprunt
     *
     * @param \Biblio\GeneralBundle\Entity\Emprunt $emprunt
     * @return Exemplaire
     */
    public function setEmprunt(\Biblio\GeneralBundle\Entity\Emprunt $emprunt = null)
    {
        $this->emprunt = $emprunt;
    
        return $this;
    }

    /**
     * Get emprunt
     *
     * @return \Biblio\GeneralBundle\Entity\Emprunt 
     */
    public function getEmprunt()
    {
        return $this->emprunt;
    }
}
