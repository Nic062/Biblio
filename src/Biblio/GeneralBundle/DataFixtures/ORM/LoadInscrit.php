<?php

namespace Biblio\GeneralBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Biblio\GeneralBundle\Entity\Inscrit;

class LoadInscrit implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $noms = array(
      'Varlet',
      'Dengrville',
      'Morel',
      'Mendel',
      'Wattez'
    );
	
	$prenoms = array(
      'Nicolas',
      'Quentin',
      'Luc',
      'Antoine',
      'Hugues'
    );
	
	$naissances = array(
      '1993-01-01',
      '1995-01-01',
	  '1995-01-01',
	  '1995-01-01',
	  '1995-01-31'
    );
	
	$rues = array(
      '3 rue inconnue',
	  '3 rue inconnue',
	  '3 rue inconnue',
	  '3 rue inconnue',
	  '2 rue Notre Dame'
    );
	
	$villes = array(
      'Beaurain',
	  'Lens',
	  'Lens',
	  'Lens',
	  'Guemappe'
    );
	
	$cps = array(
      "62000",
	  "62000",
	  "62000",
	  "62000",
	  "62128"
    );
	
	$emails = array(
      "toto@tata.tt",
	  "toto@tata.tt",
	  "toto@tata.tt",
	  "toto@tata.tt",
	  "hugues.wattez@outlook.fr"
    );
	
	$tels = array(
      "01020304506",
	  "01020304506",
	  "01020304506",
	  "01020304506",
	  "0609795224"
    );

    for ($i=0;$i<5;$i++) {
      $inscrit = new Inscrit();
	  
      $inscrit->setNom($noms[$i]);
	  $inscrit->setPrenom($prenoms[$i]);
	  $inscrit->setNaissance(new \Datetime($naissances[$i]));
	  $inscrit->setRue($rues[$i]);
	  $inscrit->setVille($villes[$i]);
	  $inscrit->setCp($cps[$i]);
	  $inscrit->setEmail($emails[$i]);
	  $inscrit->setTel($tels[$i]);

      $manager->persist($inscrit);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}