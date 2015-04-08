<?php
// src/Acme/UserBundle/Entity/User.php

namespace Biblio\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /*public function __construct()
    {
        parent::__construct();
        // your own logic
    }*/
	
	
     
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nom;
	/**
     * Set nom
     *
     * @param integer $nom
     * @return User
     */
	     /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    protected $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="naissance", type="date")
     */
    protected $naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    protected $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50)
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=6)
     */
    protected $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=12)
     */
    protected $tel;
	
	/**
	* @ORM\OneToMany(targetEntity="Biblio\GeneralBundle\Entity\Emprunt", mappedBy="inscrit")
	*/
	protected $emprunts;
	
	    /**
     * Set nom
     *
     * @param string $nom
     * @return Inscrit
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
     * Set prenom
     *
     * @param string $prenom
     * @return Inscrit
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set naissance
     *
     * @param \DateTime $naissance
     * @return Inscrit
     */
    public function setNaissance($naissance)
    {
        $this->naissance = $naissance;
    
        return $this;
    }

    /**
     * Get naissance
     *
     * @return \DateTime 
     */
    public function getNaissance()
    {
        return $this->naissance;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Inscrit
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    
        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Inscrit
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Inscrit
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return Inscrit
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }
   
}