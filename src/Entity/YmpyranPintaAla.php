<?php


namespace App\Entity;


class YmpyranPintaAla
{
    private $sade;
    private $ympyranAla;

    /**
     * @return mixed
     */
    public function getSade()
    {
        return $this->sade;
    }

    /**
     * @param mixed $sade
     */
    public function setSade($sade): void
    {
        $this->sade = $sade;
    }

    /**
     * @return mixed
     *
     * Palauttaa ympyrän pinta-alan
     */
    public function getYmpyranAla()
    {
        return (pi() * pow($this->sade,2));
    }

    /**
     * @param mixed $ympyranAla
     */
    public function setYmpyranAla($ympyranAla): void
    {
        $this->ympyranAla = $ympyranAla;
    }

}