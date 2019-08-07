<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OsastoRepository")
 */
class Osasto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $nimi;

    /**
     * @ORM\Column(type="integer")
     */
    private $osastoIDP;

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

    public function getOsastoIDP(): ?int
    {
        return $this->osastoIDP;
    }

    public function setOsastoIDP(int $osastoIDP): self
    {
        $this->osastoIDP = $osastoIDP;

        return $this;
    }
}
