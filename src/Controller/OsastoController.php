<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

// Tietokannan taulu
use App\Entity\Osasto;

// Lomakkeita varten
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OsastoController extends AbstractController
{
    /**
     * @Route("/nooranKahvikauppa", name="osastoListaus")
     * @Method({"GET"})
     */
    public function index()
    {
    	// Haetaan kaikki osastot tietokannasta
    	$osastot = $this->getDoctrine()->getRepository(Osasto::class)->findAll();

    	// Luodaan näkymä joka näyttää osastot selaimessa
        return $this->render('nooranKahvikauppa/index.html.twig', array(
        	'osastot'	=> $osastot,
        ));
    }

    /**
     * @Route("/nooranKahvikauppa/uusi", name="uusi_osasto")
     * @Method({"POST"})
     */
    public function uusiOsasto(Request $request){
    	// Luodaan olimuuttuja
    	$uusiOsasto = new Osasto();

    	// Luodaan lomake uuden osaston lisäämistä varten
    	$lomake = $this->createFormBuilder($uusiOsasto)
    	->add('nimi', TextType::class, [
    		'required'=>false, 
    		'label'=>'Osaston nimi'
    	])
    	->add('osasto_idp', TextType::class, [
    		'required'=>false, 
    		'label'=>'Osaston IDP'
    	])
    	->add('tallenna', SubmitType::class, [
    		'label'=>'Tallenna'
    	])
    	->getForm();

    	// Käsitellään painike
    	$lomake->handleRequest($request);

    	// Tarkistetaan painettiinko painiketta
    	 if ($lomake->isSubmitted() && $lomake->isValid()) {
    	 	// Kyllä, joten talletetaan uusi osasto tietokantaan
    	 	$uusiOsasto = $lomake->getData();
    	 	$entityManager = $this->getDoctrine()->getManager();
    	 	$entityManager->persist($uusiOsasto);
    	 	$entityManager->flush();

    	 	// Ohjataan takaisin index-sivulle
    	 	return $this->redirectToRoute('osastoListaus');
    	 }

    	// Luodaan näkymä, joka näyttää syöttölomakkeen
    	return $this->render('nooranKahvikauppa/uusiOsasto.html.twig', array(
    		'lomake'=>$lomake->createView()
    	));
    }

    /**
     * @Route("/nooranKahvikauppa/editoi/{id}", name="editoi_osasto")
     * @Method({"POST"})
     */
    public function päivitäOsasto(Request $request, $id){
    	// Luodaan osasto-olio
    	$päivitäOsasto = new Osasto();

    	// Haetaan päivitettävä osasto
    	$päivitäOsasto = $this->getDoctrine()->getRepository(Osasto::class)->find($id);

    	// Luodaan lomake
    	$lomake = $this->createFormBuilder($päivitäOsasto)
    	->add('nimi', TextType::class, [
    		'required'=>false, 
    		'label'=>'Osaston nimi'
    	])
    	->add('osasto_idp', TextType::class, [
    		'required'=>false, 
    		'label'=>'Osaston IDP'
    	])
    	->add('tallenna', SubmitType::class, [
    		'label'=>'Tallenna'
    	])
    	->getForm();

    	// Käsitellään painike
    	$lomake->handleRequest($request);

    	// Tarkistetaan painettiinko painiketta
    	 if ($lomake->isSubmitted() && $lomake->isValid()) {
    	 	// Kyllä, joten talletetaan päivitetty osasto tietokantaan
    	 	$entityManager = $this->getDoctrine()->getManager();
    	 	$entityManager->flush();

    	 	// Ohjataan takaisin index-sivulle
    	 	return $this->redirectToRoute('osastoListaus');
    	 }

    	// Luodaan näkymä, joka näyttää syöttölomakkeen
    	return $this->render('nooranKahvikauppa/editoiOsasto.html.twig', [
    		'lomake'=>$lomake->createView()
    	]);
    }

    /**
     * @Route("/nooranKahvikauppa/{id}", name="osastohaku")
     */
    public function näytäOsasto($id){
    	// Haetaan tietokannasta yksittäinen osasto id-tunnisteen perusteella
    	$osasto = $this->getDoctrine()->getRepository(Osasto::class)->find($id);

    	// Luodaan näkymä joka näyttää osaston selaimessa
        return $this->render('nooranKahvikauppa/näytäOsasto.html.twig', array(
        	'osasto'	=> $osasto,
        ));	

    }

    /**
     * @Route("/nooranKahvikauppa/poista/{id}", name="poista_osasto")
     * @Method({"DELETE"})
     */
    public function poistaOsasto(Request $reqquest, $id){

    	// Haetaan poistettava osasto tietokannasta
    	$poistaOsasto = $this->getDoctrine()->getRepository(Osasto::class)->find($id);

    	// Poista osasto tietokannasta
    	$entityManager = $this->getDoctrine()->getManager();
    	$entityManager->remove($poistaOsasto);
    	 	$entityManager->flush();

	 	//
    	 	return(new Response);
    }
    
}
