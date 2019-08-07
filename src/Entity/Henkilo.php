<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HenkiloRepository")
 */
class Henkilo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $etunimi;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sukunimi;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtunimi(): ?string
    {
        return $this->etunimi;
    }

    public function setEtunimi(string $etunimi): self
    {
        $this->etunimi = $etunimi;

        return $this;
    }

    public function getSukunimi(): ?string
    {
        return $this->sukunimi;
    }

    public function setSukunimi(string $sukunimi): self
    {
        $this->sukunimi = $sukunimi;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
