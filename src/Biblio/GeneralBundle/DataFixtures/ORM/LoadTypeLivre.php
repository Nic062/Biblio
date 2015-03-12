<?php

namespace Biblio\GeneralBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Biblio\GeneralBundle\Entity\TypeLivre;

class LoadTypeLivre implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $libelles = array(
      'Romans & Fictions',
      'Bande Dessinée, Comics & Manga',
      'Arts & Culture',
      'Documents & Médias',
      'Erotisme',
	  'Esotérisme',
	  'Guides & Santé',
	  'Histoire & Géographie',
	  'Jeunesse',
	  'Langues',
	  'Lettres',
	  'Loisirs, Vie pratique & Société',
	  'Religions & Spiritualité',
	  'Sciences',
    );

    for ($i=0;$i<count($libelles);$i++) {
      $typelivre = new TypeLivre();
	  
      $typelivre->setLibelle($libelles[$i]);

      $manager->persist($typelivre);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}