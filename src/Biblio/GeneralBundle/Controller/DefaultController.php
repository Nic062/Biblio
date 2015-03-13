<?php

namespace Biblio\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Biblio\GeneralBundle\Entity\Livre;
use Biblio\GeneralBundle\Entity\Exemplaire;
use Biblio\GeneralBundle\Entity\Emprunt;
use Biblio\GeneralBundle\Entity\Auteur;
use Biblio\GeneralBundle\Entity\Inscrit;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('BiblioGeneralBundle:Default:index.html.twig');
    }
	
	public function adduserAction(Request $request){
	
		$user = new Inscrit();

		$form = $this->get('form.factory')->createBuilder('form', $user)
			->add('nom',     'text')
			->add('prenom',   'text')
			->add('naissance',      'date')
			->add('rue',      'text')
			->add('ville',      'text')
			->add('cp',      'text')
			->add('email',      'email')
			->add('tel',      'text')
			->add('save',      'submit')
			->getForm();
		;
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

			return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $user->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:adduser.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function edituserAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('BiblioGeneralBundle:Inscrit')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $user)
			->add('nom',     'text')
			->add('prenom',   'text')
			->add('naissance',      'date')
			->add('rue',      'text')
			->add('ville',      'text')
			->add('cp',      'text')
			->add('email',      'email')
			->add('tel',      'text')
			->add('save',      'submit')
			->getForm();
		;
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

			return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $user->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:edituser.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deleteuserAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$member = $em->getRepository('BiblioGeneralBundle:Inscrit')->find($id);
		
		if (null === $member) {
		  throw new NotFoundHttpException("Le membre d'id ".$id." n'existe pas.");
		}
		
		$em->remove($member);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showusers'));
    }
	
	public function showusersAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$listMembers = $em->getRepository('BiblioGeneralBundle:Inscrit')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showusers.html.twig', array(
			'listMembers'           => $listMembers
		));
    }
	
	public function showuserAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$member = $em->getRepository('BiblioGeneralBundle:Inscrit')->find($id);
		
		if (null === $member) {
		  throw new NotFoundHttpException("Le membre d'id ".$id." n'existe pas.");
		}
		
		return $this->render('BiblioGeneralBundle:Default:showuser.html.twig', array(
			'member'           => $member
		));
    }
	
	public function addautorAction(Request $request){
	
		$auteur = new Auteur();

		$form = $this->get('form.factory')->createBuilder('form', $auteur)
			->add('nom',     'text')
			->add('prenom',   'text')
			->add('naissance',      'date')
			->add('save',      'submit')
			->getForm();
		;
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($auteur);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

			return $this->redirect($this->generateUrl('biblio_general_showautor', array('id' => $auteur->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addautor.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function editautorAction($id, Request $request){
	
		$auteur = $this->getDoctrine()->getManager()->getRepository('BiblioGeneralBundle:Auteur')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $auteur)
			->add('nom',     'text')
			->add('prenom',   'text')
			->add('naissance',      'date')
			->add('save',      'submit')
			->getForm();
		;
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($auteur);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

			return $this->redirect($this->generateUrl('biblio_general_showautor', array('id' => $auteur->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addautor.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deleteautorAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$autor = $em->getRepository('BiblioGeneralBundle:Auteur')->find($id);
		
		if (null === $autor) {
		  throw new NotFoundHttpException("L'auteur d'id ".$id." n'existe pas.");
		}
		
		$em->remove($autor);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showautors'));
    }
	
	public function showautorsAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$listAutors = $em->getRepository('BiblioGeneralBundle:Auteur')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showautors.html.twig', array(
			'listAutors'           => $listAutors
		));
    }
	
	public function showautorAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$autor = $em->getRepository('BiblioGeneralBundle:Auteur')->find($id);
		
		if (null === $autor) {
		  throw new NotFoundHttpException("L'auteur d'id ".$id." n'existe pas.");
		}
		
		return $this->render('BiblioGeneralBundle:Default:showautor.html.twig', array(
			'autor'           => $autor
		));
    }
	
	public function showtypeslivreAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$listTypesLivre = $em->getRepository('BiblioGeneralBundle:TypeLivre')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showtypeslivre.html.twig', array(
			'listTypesLivre'           => $listTypesLivre
		));
    }
	
	public function showtypelivreAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$typeLivre = $em->getRepository('BiblioGeneralBundle:TypeLivre')->find($id);
		
		if (null === $typeLivre) {
		  throw new NotFoundHttpException("Le type de livre d'id ".$id." n'existe pas.");
		}
		
		return $this->render('BiblioGeneralBundle:Default:showtypelivre.html.twig', array(
			'typeLivre'           => $typeLivre
		));
    }
	
	public function addlivreAction(Request $request){
	
		$livre = new Livre();

		$form = $this->get('form.factory')->createBuilder('form', $livre)
			->add('titre',     'text')
			->add('auteurs', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Auteur',
			  'property' => 'nom',
			  'multiple' => true
			))
			->add('annee',   'integer')
			->add('resume',      'text')
			->add('typelivre', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:TypeLivre',
			  'property' => 'libelle'
			))
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($livre);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Livre bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $livre->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addlivre.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function editlivreAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$livre = $em->getRepository('BiblioGeneralBundle:Livre')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $livre)
			->add('titre',     'text')
			->add('auteurs', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Auteur',
			  'property' => 'nom',
			  'multiple' => true
			))
			->add('annee',   'integer')
			->add('resume',      'text')
			->add('typelivre', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:TypeLivre',
			  'property' => 'libelle'
			))
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($livre);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Livre bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $livre->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addlivre.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deletelivreAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$livre = $em->getRepository('BiblioGeneralBundle:Livre')->find($id);
		
		if (null === $livre) {
		  throw new NotFoundHttpException("Le livre d'id ".$id." n'existe pas.");
		}
		
		$em->remove($livre);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showlivres'));
    }
	
	public function showlivresAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$listLivres = $em->getRepository('BiblioGeneralBundle:Livre')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showlivres.html.twig', array(
			'listLivres'           => $listLivres
		));
    }
	
	public function showlivreAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$livre = $em->getRepository('BiblioGeneralBundle:Livre')->find($id);
		
		if (null === $livre) {
		  throw new NotFoundHttpException("Le livre d'id ".$id." n'existe pas.");
		}
		
		return $this->render('BiblioGeneralBundle:Default:showlivre.html.twig', array(
			'livre'           => $livre
		));
    }
	
	public function addexemplaireAction(){
	
		$em = $this->getDoctrine()->getManager();
		
		$ex = new Exemplaire();
		$ex->setEdition($em->getRepository('BiblioGeneralBundle:Edition')->findOneByNom("Hachette"));
		$livre=$em->getRepository('BiblioGeneralBundle:Livre')->findOneByTitre("Germinal");
		$ex->setLivre($livre);
		
		$em->persist($ex);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $livre->getId())));
		
	}
	
	public function addeditionAction(){
	
		$em = $this->getDoctrine()->getManager();
		
		$edition = new Edition();
		$edition->setNom('lol');
		
		$em->persist($edition);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showedition', array('id' => $edition->getId())));
		
	}
	
	public function showeditionsAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$editions = $em->getRepository('BiblioGeneralBundle:Edition')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showeditions.html.twig', array(
			'editions'           => $editions
		));
    }
	
	public function showeditionAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$edition = $em->getRepository('BiblioGeneralBundle:Edition')->find($id);
		
		if (null === $edition) {
		  throw new NotFoundHttpException("L'édition d'id ".$id." n'existe pas.");
		}
		
		return $this->render('BiblioGeneralBundle:Default:showedition.html.twig', array(
			'edition'           => $edition
		));
    }
	
	
	public function addempruntAction(){
	
		$em = $this->getDoctrine()->getManager();
		
		$emprunt = new Emprunt();
		$inscrit=$em->getRepository('BiblioGeneralBundle:Inscrit')->findOneByNom("Morel");
		$emprunt->setInscrit($inscrit);
		$emprunt->setDelais(30);
		$emprunt->setExemplaire($em->getRepository('BiblioGeneralBundle:Exemplaire')->find(1));
		
		$em->persist($emprunt);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $inscrit->getId())));
		
	}
	
	public function showempruntsAction()
    {
		
		$em = $this->getDoctrine()->getManager();
		$listEmprunts = $em->getRepository('BiblioGeneralBundle:Emprunt')->findAll();
		
		return $this->render('BiblioGeneralBundle:Default:showemprunts.html.twig', array(
			'listEmprunts'           => $listEmprunts
		));
    }
	
}
