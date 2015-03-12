<?php

namespace Biblio\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeLivre
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeLivre
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;
	
	/**
	* @ORM\OneToMany(targetEntity="Biblio\GeneralBundle\Entity\Livre", mappedBy="typelivre")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $livres;


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
     * Set libelle
     *
     * @param string $libelle
     * @return TypeLivre
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set livres
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $livres
     * @return TypeLivre
     */
    public function setLivres(\Biblio\GeneralBundle\Entity\Livre $livres)
    {
        $this->livres = $livres;
    
        return $this;
    }

    /**
     * Get livres
     *
     * @return \Biblio\GeneralBundle\Entity\Livre 
     */
    public function getLivres()
    {
        return $this->livres;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livres
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $livres
     * @return TypeLivre
     */
    public function addLivre(\Biblio\GeneralBundle\Entity\Livre $livres)
    {
        $this->livres[] = $livres;
    
        return $this;
    }

    /**
     * Remove livres
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $livres
     */
    public function removeLivre(\Biblio\GeneralBundle\Entity\Livre $livres)
    {
        $this->livres->removeElement($livres);
    }

    /**
     * Add exemplaires
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $exemplaires
     * @return TypeLivre
     */
    public function addExemplaire(\Biblio\GeneralBundle\Entity\Livre $exemplaires)
    {
        $this->exemplaires[] = $exemplaires;
    
        return $this;
    }

    /**
     * Remove exemplaires
     *
     * @param \Biblio\GeneralBundle\Entity\Livre $exemplaires
     */
    public function removeExemplaire(\Biblio\GeneralBundle\Entity\Livre $exemplaires)
    {
        $this->exemplaires->removeElement($exemplaires);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }
}
