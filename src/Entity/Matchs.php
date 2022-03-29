<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchsRepository::class)
 */
class Matchs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateMatch;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuDuMatch;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $resultatSagc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $resultatAdversaire;

    /**
     * @ORM\ManyToOne(targetEntity=Equipes::class, inversedBy="matchs")
     */
    private $equipe;

    /**
     * @ORM\ManyToOne(targetEntity=Adversaires::class, inversedBy="matchs")
     */
    private $adversaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->DateMatch;
    }

    public function setDateMatch(\DateTimeInterface $DateMatch): self
    {
        $this->DateMatch = $DateMatch;

        return $this;
    }

    public function getLieuDuMatch(): ?string
    {
        return $this->lieuDuMatch;
    }

    public function setLieuDuMatch(string $lieuDuMatch): self
    {
        $this->lieuDuMatch = $lieuDuMatch;

        return $this;
    }

    public function getResultatSagc(): ?int
    {
        return $this->resultatSagc;
    }

    public function setResultatSagc(?int $resultatSagc): self
    {
        $this->resultatSagc = $resultatSagc;

        return $this;
    }

    public function getResultatAdversaire(): ?int
    {
        return $this->resultatAdversaire;
    }

    public function setResultatAdversaire(?int $resultatAdversaire): self
    {
        $this->resultatAdversaire = $resultatAdversaire;

        return $this;
    }

    public function getEquipe(): ?Equipes
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipes $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getAdversaire(): ?Adversaires
    {
        return $this->adversaire;
    }

    public function setAdversaire(?Adversaires $adversaire): self
    {
        $this->adversaire = $adversaire;

        return $this;
    }
}
