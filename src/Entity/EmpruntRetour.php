<?php

namespace App\Entity;

use App\Repository\EmpruntRetourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * EmpruntRetour
 *
 * @ORM\Table(name="emprunt_retour", indexes={@ORM\Index(name="FK_EMPRUNT__APP04_LIVRE", columns={"livre_id"}), @ORM\Index(name="FK_EMPRUNT__APP05_ETUDIANT", columns={"etudiant_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=EmpruntRetourRepository::class)
 */
class EmpruntRetour
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_emprunt_retour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpruntRetour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_emprunt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateEmprunt ;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_retour", type="datetime", nullable=true)
     */
    private $dateRetour = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_retour", type="string", length=1, nullable=false)
     */
    private $etatRetour = 'B';

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="livre_id", referencedColumnName="id_livre")
     * })
     */
    private $livre;

    /**
     * @var \Etudiant
     *
     * @ORM\ManyToOne(targetEntity="Etudiant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etudiant_id", referencedColumnName="cin")
     * })
     */
    private $etudiant;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateEmprunt = new \DateTime();
    }


    public function getIdEmpruntRetour(): ?int
    {
        return $this->idEmpruntRetour;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $dateEmprunt): self
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(?\DateTimeInterface $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    public function getEtatRetour(): ?string
    {
        return $this->etatRetour;
    }

    public function setEtatRetour(?string $etatRetour): self
    {
        $this->etatRetour = $etatRetour;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }


}
