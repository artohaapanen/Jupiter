<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LampotilaRepository")
 */
class Lampotila
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $ma;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $ti;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $ke;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $torstai;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $perjantai;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $lauantai;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $sunnuntai;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMa(): ?string
    {
        return $this->ma;
    }

    public function setMa(string $ma): self
    {
        $this->ma = $ma;

        return $this;
    }

    public function getTi(): ?string
    {
        return $this->ti;
    }

    public function setTi(string $ti): self
    {
        $this->ti = $ti;

        return $this;
    }

    public function getKe(): ?string
    {
        return $this->ke;
    }

    public function setKe(string $ke): self
    {
        $this->ke = $ke;

        return $this;
    }

    public function getTorstai(): ?string
    {
        return $this->torstai;
    }

    public function setTorstai(string $torstai): self
    {
        $this->torstai = $torstai;

        return $this;
    }

    public function getPerjantai(): ?string
    {
        return $this->perjantai;
    }

    public function setPerjantai(string $perjantai): self
    {
        $this->perjantai = $perjantai;

        return $this;
    }

    public function getLauantai(): ?string
    {
        return $this->lauantai;
    }

    public function setLauantai(string $lauantai): self
    {
        $this->lauantai = $lauantai;

        return $this;
    }

    public function getSunnuntai(): ?string
    {
        return $this->sunnuntai;
    }

    public function setSunnuntai(string $sunnuntai): self
    {
        $this->sunnuntai = $sunnuntai;

        return $this;
    }
}
