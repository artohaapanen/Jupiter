<?php
	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

	// Harjoitukseen 7 ja 8 liittyvät komponentit
	use App\Entity\Task;
	use App\Entity\Task2;
	use Symfony\Component\Form\Extension\Core\Type\DateType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\HttpFoundation\Request;
	use App\Form\ArticleFormType;

	// Harjoitus 9
	use App\Entity\Lampotila;
	use App\Entity\Henkilo;
	use App\Form\LampotilaType;

	// HArjoitus 10
	use App\Entity\Kuntopiste;
	use App\Form\KuntopisteetType;	

	class TestiController extends AbstractController{

		/**
		* @Route("/harjoitukset")
		*/
		public function index(){
			// Tehdään harjoitusten lopuksi (kotisivu).
		}

		public function alihaara(){
		    // Testi gittiin
        }

		/**
		* @Route("/harjoitukset/harj1")
		*/
		public function harj1(){
			$var = 'PHP-opas';

			return new Response(
				'<html><body><h3>'.$var.'</h3><p>PHP on lyhenne sanoista PHP: Hypertext Preprocessor) on 
                Perlin kaltainen ohjelmointikieli, jota käytetään erityisesti web-palvelinympäristöissä dynaamisten 
                web-sivujen luonnissa.</p><p><a href="https:\\www.w3schools.com\php7">Avaa '.$var.'</a>.</p></body></html>'
			);			
		}

		/**
		*	@Route("/harjoitukset/harj2")
		*/
		public function harj2(){
		    // Luodaan muuttuja var ja talletetaan siihen otsikkoteksti
			$var = 'PHP opas';

			// Kutsutaan näkymää ja lähetetään sille muuttujan var sisältö
			return $this->render('harjoitukset/harj2.html.twig',[
				'var' => $var,
			]);
		}

		/**
		*	@Route("/harjoitukset/harj3")
		*/
		public function harj3(){
			// Laske ympyrän pinta-ala, kun säde on 5
			// Kaava on A = 3.14 * r * r

			$ympyranSade = 5;
			$ympyranAla = 3.14 * $ympyranSade^2;

			// Pyydetään palvelinta näyttämään ympyrän pinta-ala
			return new Response('Ympyrän säde = '.$ympyranAla);
		}

		/**
		*	@Route("/harjoitukset/harj4")
		*
		*	Lasketaan ympyrän ala kun sen säde on 5.
		*/
		public function harj4(){
			$ympyranSade = 5;
			$ympyranAla = 3.14 * $ympyranSade^2;

			// Kutsutaan näkymää
			return $this->render('harjoitukset/harj4.html.twig',[
				'YmpyranAla' => $ympyranAla,
			]);
		}

		/**
		*	@Route("/harjoitukset/harj5")
		*
		*	Lasketaan lukujen 2,4,9,4 keskiarvo. Muotoilussa käytetään Bootstrappia
		*/
		public function harj5(){
			$luku1 = 2;
			$luku2 = 5;
			$luku3 = 9;
			$luku4 = 4;

			$keskiarvo = ($luku1 + $luku2 + $luku3 + $luku4) / 4;

			return $this->render('harjoitukset/harj5.html.twig',[
				'Keskiarvo' => $keskiarvo,
			]);

		}

		/**
		*	@Route("/harjoitukset/harj6")

		*	Funktio laskee ensi viikon (ma-su) pakkaspäivien keskiarvon ja tulostaa näytölle tiistain ja 
		*	perjantain lukemat. Lopuksi lasketaan vielä koko viikon lämpötilojen keskiarvo
		*/
		public function harj6(){

			$pakkasasteet = [
    			'ma'	=> '6',
    			'ti' 	=> '3',
    			'ke' 	=> '-2',
    			'to'	=> '-4',
    			'pe'	=> '1',
    			'la'	=> '0',
    			'su'	=> '-5'
    		];

			$summa = $pakkasasteet['ke'] + $pakkasasteet['to'] + $pakkasasteet['su'];
			$keskiarvo = number_format(($summa / 3),1);

			$summa2 = $pakkasasteet['ma'] + 
			  $pakkasasteet['ti'] +
			  $pakkasasteet['ke'] +
			  $pakkasasteet['to'] +
			  $pakkasasteet['pe'] +
			  $pakkasasteet['la'] +
			  $pakkasasteet['su'];
		
			$keskiarvo2 = number_format($summa2 / count($pakkasasteet),2);

			return $this->render('harjoitukset/harj6.html.twig',[
				'Pakkasasteet' => $pakkasasteet,
				'Keskiarvo' => $keskiarvo,
				'Keskiarvo2' => $keskiarvo2,
			]);
	
		}

		/**
		*   @Route("/harjoitukset/harj7")
		*/
		public function harj7(Request $request)
    	{
	        // creates a task and gives it some dummy data for this example
	        $task = new Task();
	        $task->setTask('Write a blog post');
	        $task->setDueDate(new \DateTime('tomorrow'));

	        $form = $this->createFormBuilder($task)
	            ->add('Task', TextType::class)
	            ->add('dueDate', DateType::class)
	            ->add('save', SubmitType::class, ['label' => 'Create Task'])
	            ->getForm();

	        return $this->render('harjoitukset/harj7.html.twig', [
	            'form' => $form->createView(),
	        ]);
    	}

    	/**
		*   @Route("/harjoitukset/harj8", name="harj8")
		*/
    	public function harj8(Request $request){
    		$task = new Task2();
    		$task->setTask('Write a blog post');
	        //$task->setDueDate(new \DateTime('tomorrow'));

    		$form = $this->createForm(ArticleFormType::class, $task, [
    			'action' => $this->generateUrl('harj8'), // name="harj8"
    			'method' => 'POST' // POST on oletus ja sen voi jättää pois		
    		]);

    		// Kyselyn (request) käsittely
    		$form->handleRequest($request);
	        if ($form->isSubmitted() && $form->isValid()) {
	        	//var_dump($task); die;
	        	//echo $task->getTask(); die;
	        	
	        	// Tallenna esim. tietokantaan
	        	$em = $this->getDoctrine()->getManager();
	        	$em->persist($task);
	        	$em->flush();
	        }

	        return $this->render('harjoitukset/harj8.html.twig', [
	            'form' => $form->createView(),
	        ]);
    	}

    	/**
    	*	@Route("harjoitukset/harj9", name="harj9")
    	*	
    	*	Assosiatiivinen taulukko ja lomake
    	*/
    	public function moikkaHenkilo(Request $request){
    		// Viittaus echo $henkilo['Etunimi'] tulostaa Pekka
    		$henkilo2 = [
    			'Etunimi' 	=> 'Pekka',
    			'Sukunimi' 	=> 'Puupää',
    			'Email' 	=> 'pekka.puupaa@gmail.com'
    		];

    		$henkilo = new Henkilo();
    		//$henkilo->setEtunimi('Pekka');
    		//$henkilo->setSukunimi('Puupää');
    		//$henkilo->setEmail('pekka.puupaa@gmail.com');

    		// Luodaan lomake, jossa action = /harjoitukset/harj9
    		$form = $this->createForm(LampotilaType::class, $henkilo, [
    			'action'	=> $this->generateUrl('harj9'),
    		]);

    		// Käsitellään pyyntö
    		$form->handleRequest($request);
    		// Onko painiketta painettu?
    		if ($form->isSubmitted()){

    			// On, joten näytetään lomakkeelle syötetty etunimi
    			//echo $henkilo->getEtunimi();

    			// Näytetään pyynnon koko sisältö
    			//var_dump($henkilo); 

    			// Näytetään henkilön tiedot
    			return $this->render('harjoitukset/harj9b.html.twig', [
	            	'Henkilo'	=> $henkilo,
	        	]);

    			// Hypätään ulos funktiosta
    			die;
    		}
    		
    		// Näytetään lomake
    		return $this->render('harjoitukset/harj9a.html.twig', [
	            'Lomake'	=> $form->createView(),
	        ]);
    	}

    	/**
    	*	@Route("harjoitukset/harj10", name="harj10")
    	*
    	*	Lasketaan Arwid Leen kuntopisteet. Hölkkäkilometristä saa 4 kuntopistettä, 
    	*	hiihtokilometristä saa kaksi pistettä ja kävelykilmetristä saa yhden pisteen
    	*/
    	public function laskeKuntopisteet(){
    	
    		// Luodaan kuntopisteet
    		$kuntopiste = new Kuntopiste();
    		$kuntopiste->setNimi("Arwid Lee");
    		$kuntopiste->setKavelykilometrit(10);
    		$kuntopiste->setJuoksukilometrit(4);
    		$kuntopiste->sethiihtokilometrit(8);

    		// Lasketaan kuntopisteet
    		$kuntopisteet = $kuntopiste->getKuntopisteet();

    		// Näytetään tulokset
	        return $this->render('harjoitukset/harj10.html.twig', [
	            'Kuntopiste' 	=> $kuntopiste,
	            'Kuntopisteet'	=> $kuntopisteet
	        ]);
    	}

    	/**
    	*	@Route("/harjoitukset/harjXa", name="harjXa")
    	*
    	*	Lasketaan Arwid Leen kuntopisteet, seuraavien ohjeiden perusteella. Hölkkäkilometristä saa 4 
    	* 	kuntopistettä, hiihtokilometristä saa kaksi pistettä ja kävelykilometristä saa yhden pisteen.
    	*/
    	public function laskeKuntopisteet2(Request $request){

    		$kuntopiste = new Kuntopiste();

    		// Luodaan kuntopistelomake
    		$form = $this->createForm(KuntopisteetType::class, $kuntopiste,[
    			'action'	=> $this->generateUrl('harjXa'),
    		]);

    		// Käsitellään pyyntö
    		$form->handleRequest($request);
    		// Onko painiketta painettu?
    		if ($form->isSubmitted()){    			

    			// Lasketaan kuntopisteet ja näytetään ne

    			return $this->render('harjoitukset/harjXa.html.twig', [
	            	'Kuntopisteet'	=> $kuntopisteet,
	        	]);

    			// Hypätään ulos funktiosta
    			die; 
			}			
	        
	        // Näytetään syöttölomake
	        return $this->render('harjoitukset/harjXb.html.twig', [
	            'form' => $form->createView(),
	        ]);

    	}

    	 /**
    	*	@Route("/harjoitukset/harj11")
    	*
    	*	Lasketaan vesiliuoksen pH kaavalla pH=-logX.
    	*/
    	public function harj11(){
    		$x = 2.13*pow(10,-5);
    		$pH = -log10($x);

    		return new Response('pH= '.number_format($pH));
    	}

	}
