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
use Biblio\GeneralBundle\Entity\Edition;

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

		return $this->render('BiblioGeneralBundle:Default:editlivre.html.twig', array(
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
	
	
	
	
	public function addexemplaireAction(Request $request){
	
		$exemplaire = new Exemplaire();

		$form = $this->get('form.factory')->createBuilder('form', $exemplaire)
			->add('edition', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Edition',
			  'property' => 'nom'
			))
			->add('livre', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Livre',
			  'property' => 'titre'
			))
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($exemplaire);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Exemplaire bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $exemplaire->getLivre()->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addedition.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function editexemplaireAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$exemplaire = $em->getRepository('BiblioGeneralBundle:Exemplaire')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $exemplaire)
			->add('edition', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Edition',
			  'property' => 'nom'
			))
			->add('livre', 'entity', array(
			  'class'    => 'BiblioGeneralBundle:Livre',
			  'property' => 'titre'
			))
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($exemplaire);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Exemplaire bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $exemplaire->getLivre()->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addedition.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deleteexemplaireAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$exemplaire = $em->getRepository('BiblioGeneralBundle:Exemplaire')->find($id);
		$idLivre=$exemplaire->getLivre()->getId();
		
		if (null === $exemplaire) {
		  throw new NotFoundHttpException("L'exemplaire d'id ".$id." n'existe pas.");
		}
		
		$em->remove($exemplaire);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showlivre', array('id' => $idLivre)));
    }
	
	
	
	
	public function addeditionAction(Request $request){
	
		$edition = new Edition();

		$form = $this->get('form.factory')->createBuilder('form', $edition)
			->add('Nom',     'text')
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($edition);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Edition bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showedition', array('id' => $edition->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:addedition.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function editeditionAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$edition = $em->getRepository('BiblioGeneralBundle:Edition')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $edition)
			->add('Nom',     'text')
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($edition);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Edition bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showedition', array('id' => $edition->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:editedition.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deleteeditionAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$edition = $em->getRepository('BiblioGeneralBundle:Edition')->find($id);
		
		if (null === $edition) {
		  throw new NotFoundHttpException("L'édition d'id ".$id." n'existe pas.");
		}
		
		$em->remove($edition);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showeditions'));
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
	
	
	

	public function addempruntAction($idUser=128, $idExemplaire){
	
		$emprunt = new Emprunt();
		
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('BiblioGeneralBundle:Inscrit')->find($idUser);
		$exemplaire = $em->getRepository('BiblioGeneralBundle:Exemplaire')->find($idExemplaire);
		
		if (null === $user) {
		  throw new NotFoundHttpException("L'utilisateur d'id ".$idUser." n'existe pas.");
		}
		if (null === $exemplaire) {
		  throw new NotFoundHttpException("L'exemplaire d'id ".$idExemplaire." n'existe pas.");
		}
		
		$emprunt->setInscrit($user);
		$emprunt->setExemplaire($exemplaire);
		$emprunt->setDelais(30);
		$em->persist($emprunt);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $user->getId())));

		
	}
	
	public function editempruntAction($id, Request $request){
	
		$em = $this->getDoctrine()->getManager();
		$emprunt = $em->getRepository('BiblioGeneralBundle:Emprunt')->find($id);

		$form = $this->get('form.factory')->createBuilder('form', $emprunt)
			->add('delais',      'integer')
			->add('save',      'submit')
			->getForm();
		
		$form->handleRequest($request);

		if ($form->isValid()) {
		
			$em = $this->getDoctrine()->getManager();
			$em->persist($emprunt);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Emprunt bien enregistré.');

			return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $emprunt->getInscrit()->getId())));
		}

		return $this->render('BiblioGeneralBundle:Default:editemprunt.html.twig', array(
			'form' => $form->createView(),
		));
		
	}
	
	public function deleteempruntAction($id)
    {
		
		$em = $this->getDoctrine()->getManager();
		$emprunt = $em->getRepository('BiblioGeneralBundle:Emprunt')->find($id);
		
		if (null === $emprunt) {
		  throw new NotFoundHttpException("L'emprunt d'id ".$id." n'existe pas.");
		}
		
		$idUser=$emprunt->getInscrit()->getId();
		
		$em->remove($emprunt);
		$em->flush();
		
		return $this->redirect($this->generateUrl('biblio_general_showuser', array('id' => $idUser)));
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
