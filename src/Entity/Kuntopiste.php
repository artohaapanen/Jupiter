<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KuntopisteRepository")
 */
class Kuntopiste
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nimi;

    /**
     * @ORM\Column(type="integer")
     */
    private $hiihtokilometrit;

    /**
     * @ORM\Column(type="integer")
     */
    private $juoksukilometrit;

    /**
     * @ORM\Column(type="integer")
     */
    private $kavelykilometrit;

    /**
     * @ORM\Column(type="integer")
     */
    private $kuntopisteet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNimi(): ?string
    {
        return $this->nimi;
    }

    public function setNimi(string $nimi): self
    {
        $this->nimi = $nimi;

        return $this;
    }

    public function getHiihtokilometrit(): ?int
    {
        return $this->hiihtokilometrit;
    }

    public function setHiihtokilometrit(int $hiihtokilometrit): self
    {
        $this->hiihtokilometrit = $hiihtokilometrit;

        return $this;
    }

    public function getJuoksukilometrit(): ?int
    {
        return $this->juoksukilometrit;
    }

    public function setJuoksukilometrit(int $juoksukilometrit): self
    {
        $this->juoksukilometrit = $juoksukilometrit;

        return $this;
    }

    public function getKavelykilometrit(): ?int
    {
        return $this->kavelykilometrit;
    }

    public function setKavelykilometrit(int $kavelykilometrit): self
    {
        $this->kavelykilometrit = $kavelykilometrit;

        return $this;
    }

    public function getKuntopisteet(): ?int
    {
        $this->kuntopisteet = 2 * $this->hiihtokilometrit + 4 * $this->juoksukilometrit + $this->kavelykilometrit;
        return $this->kuntopisteet;
    }

    public function setKuntopisteet(int $kuntopisteet): self
    {
        $this->kuntopisteet = $kuntopisteet;

        return $this;
    }
}
