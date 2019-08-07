<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\YmpyranPintaAla;


class MuuttujatController extends AbstractController
{
    /**
     * @Route("/esimerkit/esim1")
     */
    public function esim1(){
        // $-merkki
        $esimerkki1 = 'PHP-kielessä muuttuja alkaa $-merkillä (esim. $etunimi)';
        // luku: integer
        $esimerkki2 = 10;
        // luku: float
        $esimerkki3 = 1.2;
        // Yhdistäminen
        $esimerkki4 = 'Seuraavassa on kaksi lukua: ' . $esimerkki2 . ", " . $esimerkki3;
        // Taulukko
        $esimerkki5 = ["Tomaatti", "Pinaatti"];
        // Assosatiivinen taulukko
        $esimerkki6 = [
            'etunimi'   => 'Arto',
            'sukunimi'  => 'Haapanen',
            'email'     => 'arto.haapanen@bc.fi'
        ];

        // Kutsutaan näkymää ja lähetetään sille kaikki muuttujat
        return $this->render('esimerkit/esimerkki1.html.twig', [
            'esim1' => $esimerkki1,
            'esim2' => $esimerkki2,
            'esim3' => $esimerkki3,
            'esim4' => $esimerkki4,
            'esim5' => $esimerkki5,
            'esim6'  => $esimerkki6,
            ]);
    }

    /**
     * @Route("esimerkit/esim2")
     *
     * Tässä esimerkissä tutkitaan kolmioita
     */
    public function esim2(){
        // Kolmion sivut. Onko kyseessä tasasivuinen, tasakylkinen vai suorakulmainen?
        $sivua = 3;
        $sivub = 3;
        $sivuc = 1;
        $tyyppi = '';

        // Ovatko kaikki sivut positiivisia lukuja?
        if($sivua > 0 && $sivub > 0 && $sivuc > 0){
            // Kyllä, joten tutkitaan mikä kolmiotyyppi on kysessä?

            // Onko kolmio tasasivuinen?
            if($sivua == $sivub && $sivua == $sivuc){
                // Kyllä
                $tyyppi = 'Tasasivuinen';
            }
            // Onko kolmio tasakylkinen?
            elseif($sivua == $sivub || $sivua == $sivuc || $sivub == $sivuc){
                // Kyllä
                $tyyppi = 'Tasakylkinen';
            }
            // Onko kolmio suorakulmainen?
            elseif( ( pow($sivua,2) + pow($sivub,2) ) == pow($sivuc,2) ){
                // Kyllä
                $tyyppi = 'Suorakulmainen';
            }
            // Onko kolmio suorakulmainen?
            elseif( ( pow($sivuc,2) + pow($sivub,2) ) == pow($sivua,2) ){
                // Kyllä
                $tyyppi = 'Suorakulmainen';
            }
            // Onko kolmio suorakulmainen?
            elseif( ( pow($sivua,2) + pow($sivuc,2) ) == pow($sivub,2) ){
                // Kyllä
                $tyyppi = 'Suorakulmainen';
            }
            else{
                $tyyppi = 'määrittelemätön!';
            }

            // Lasketaan ala
            $kolmionAla = $this->kolmionAla( $sivua, $sivub, $sivuc);
            if(!$kolmionAla == 'NAN')
                $kolmionAla = $kolmionAla;
            else{
                $kolmionAla = 'määrittelemätön';
            }

        }else{
            $tyyppi = 'ei kolmio';
            $kolmionAla = 'määrittelemätön';
        }

        return $this->render('esimerkit/esimerkki2.html.twig', [
            'sivua'         => $sivua,
            'sivub'         => $sivub,
            'sivuc'         => $sivuc,
            'tyyppi'        => $tyyppi,
            'kolmionAla'    => $kolmionAla,
        ]);
    }

    function kolmionAla( $sa, $sb, $sc ){
        $apu = ( $sa + $sb + $sc ) / 2;
        return sqrt($apu * ( $apu - $sa ) * ( $apu - $sb ) * ($apu - $sc));
    }

    /**
     * @Route("/esimerkit/esim3")
     *
     * Lasketaan ympyrän pinta-ala
     */
    public function esim3(){
        // Luodaan oliomuuttuja
        $pintaAla = new YmpyranPintaAla();
        // Asetetaan säde
        $pintaAla->setSade(5);
        // lasketaan ala
        $ala = number_format($pintaAla->getYmpyranAla(), 2);
        // Pyydetään näkymää näyttämään tulos
        return $this->render('esimerkit/esimerkki3.html.twig', [
            'pintaAla'  => $ala,
        ]);
    }

}

