<?php

namespace Biblio\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edition
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Edition
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;
	
	/**
	* @ORM\OneToMany(targetEntity="Biblio\GeneralBundle\Entity\Exemplaire", mappedBy="edition")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $exemplaires;


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
     * Set nom
     *
     * @param string $nom
     * @return Edition
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
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
     * @return Edition
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
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * Add exemplaires
     *
     * @param \Biblio\GeneralBundle\Entity\Exemplaire $exemplaires
     * @return Edition
     */
    public function addExemplaire(\Biblio\GeneralBundle\Entity\Exemplaire $exemplaires)
    {
        $this->exemplaires[] = $exemplaires;
    
        return $this;
    }

    /**
     * Remove exemplaires
     *
     * @param \Biblio\GeneralBundle\Entity\Exemplaire $exemplaires
     */
    public function removeExemplaire(\Biblio\GeneralBundle\Entity\Exemplaire $exemplaires)
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
