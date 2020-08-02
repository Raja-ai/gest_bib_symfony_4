<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=AuteurRepository::class)
 */
class Auteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_auteur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_prenom", type="string", length=50, nullable=false)
     * @Assert\Length(
     * min=4,
     * max=50,
     * minMessage = "le nom d'un auteur doit comporter au moin {{ limit }} caractéres",
     * maxMessage="le nom d'un auteur doit comporter au max {{ limit }} caractéres"
     * )
     */
    private $nomPrenom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_naiss", type="date", nullable=true)
     */
    private $dateNaiss = NULL;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=50, nullable=false)
     */
    private $nationalite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=4096, nullable=true, options={"default"="NULL"})
     */
    private $description = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo = NULL;

    public function getIdAuteur(): ?int
    {
        return $this->idAuteur;
    }

    public function getNomPrenom(): ?string
    {
        return $this->nomPrenom;
    }

    public function setNomPrenom(string $nomPrenom): self
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }


}
