<?php

namespace Biblio\GeneralBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Biblio\GeneralBundle\Entity\Auteur;

class LoadAuteur implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $noms = array(
      'de Maupassant',
      'Zola',
      'Camus',
      'Hugo',
      'Christie'
    );
	
	$prenoms = array(
      'Guy',
      'Emile',
      'Albert',
      'Victor',
      'Agatha'
    );
	
	$naissances = array(
      '1850-08-05',
      '1840-04-02',
	  '1913-11-07',
	  '1802-02-26',
	  '1890-09-15'
    );

    for ($i=0;$i<5;$i++) {
      $auteur = new Auteur();
	  
      $auteur->setNom($noms[$i]);
	  $auteur->setPrenom($prenoms[$i]);
	  $auteur->setNaissance(new \Datetime($naissances[$i]));

      $manager->persist($auteur);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}