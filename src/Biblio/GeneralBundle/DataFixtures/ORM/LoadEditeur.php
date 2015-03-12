<?php

namespace Biblio\GeneralBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Biblio\GeneralBundle\Entity\Edition;

class LoadEdition implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $editions = array(
		'Hachette',
		'Atlas',
		'Belin',
		'Gallimard',
		'Editis',
    );

    for ($i=0;$i<count($editions);$i++) {
      $editeur = new Edition();
	  
      $editeur->setNom($editions[$i]);

      $manager->persist($editeur);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}