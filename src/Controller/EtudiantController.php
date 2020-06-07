<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EtudiantController extends AbstractController{ 
 
	/**
	*@Route("/etudiant/ajouter",name="route_etudiant_ajouter")
	*/	
	public function ajouter() {		 
		$e =new Etudiant();
		$e->setNom("Moujtahid");
		$e->setPrenom("Moujidd");
		$e->setNote(18.5);	
		
	$entityManager = $this->getDoctrine()->getManager();
		$entityManager->persist($e);				
		$entityManager->flush();
		
		 
		$this->addFlash("info","L'étudiant a été ajouté avec succès");
		return $this->redirectToRoute("route_etudiant_liste");
	}
	
	/**
	*@Route("/etudiant/liste",name="route_etudiant_liste")
	*/	
	public function liste() {
		$repository = $this->getDoctrine()->getRepository(Etudiant::class);
		$data=	$repository->findAll();
		return $this->render("Etudiant\liste.html.twig",["etudiants"=>$data]);
	}
	
	/**
	 *@Route("/etudiant/detail/{id}",name="route_etudiant_detail")
	 */	

	/**
	 *@Route("/etudiant/detail2/{id}",name="route_etudiant_detail2")
	 */	
	public function detail(Etudiant $etudiant) {
	 
		return $this->render("Etudiant/detail.html.twig",["etudiant"=>$etudiant]);	
	}
	
	/**
	*@Route("/etudiant/modifier/{id}",name="route_etudiant_modifier")
	*/	
	public function modifier($id) {		
		//récupérer l'étudiant
		$repository = $this->getDoctrine()->getRepository(Etudiant::class);
		$etudiant=	$repository->find($id);
		 
		$etudiant->setNote($etudiant->getNote() + 1);
		
		 
		$entityManager=$this->getDoctrine()->getManager();
		$entityManager->flush();
		
		 
		$this->addFlash("info","L'étudiant $id a été modifié avec succès");
	return $this->redirectToRoute("route_etudiant_detail",["id"=>$etudiant->getId()]);
		}
	
	/**
	 *@Route("/etudiant/supprimer/{id}",name="route_etudiant_supprimer")
	 */	
	public function supprimer($id) {
	
		 
		$repository = $this->getDoctrine()->getRepository(Etudiant::class);
		$etudiant=	$repository->find($id);
		
		 
		$entityManager=$this->getDoctrine()->getManager()->remove($etudiant);		
		$entityManager->flush();
		
		 
		$this->addFlash("info","L'étudiant $id a été supprimé avec succès");
		return $this->redirectToRoute("route_etudiant_liste");	
	}

	
 
		
 
 
 
 
 
 
 }
 
