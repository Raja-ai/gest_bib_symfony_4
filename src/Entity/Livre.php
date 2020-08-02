<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Livre
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="FK_LIVRE_APP01_AUTEUR", columns={"auteur_id"}), @ORM\Index(name="FK_LIVRE_APP02_MAISON_E", columns={"maison_edt_id"}), @ORM\Index(name="FK_LIVRE_APP03_THEME", columns={"theme_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_livre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false
     * )
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_pages", type="smallint", nullable=false
     * )
     */
    private $nbrePages;

    /**
     * @var int|null
     *
     * @ORM\Column(name="prix", type="bigint", nullable=true, options={"default"="NULL"}
     * )
     */
    private $prix = NULL;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_achat", type="date", nullable=true)
     */
    private $dateAchat = NULL;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=false, options={"default"="1"})
     */
    private $disponible = true;

    /**
     * @var string|null
     *
     * @ORM\Column(name="couverture", type="string", length=255)
     */
    private $couverture = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lien_telechargement", type="string", length=255, nullable=true, options={"default"="NULL"})
     * @Assert\Url(
     * relativeProtocol = true
     * )
     */
    private $lienTelechargement = NULL;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_telechargement", type="bigint", nullable=false)
     */
    private $nbreTelechargement = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="etat_livre", type="string", length=1, nullable=false)
     */
    private $etatLivre = 'B';

    /**
     * @var \Auteur
     *
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur_id", referencedColumnName="id_auteur")
     * })
     */
    private $auteur;

    /**
     * @var \MaisonEdt
     *
     * @ORM\ManyToOne(targetEntity="MaisonEdt")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="maison_edt_id", referencedColumnName="id_maison_edt")
     * })
     */
    private $maisonEdt;

    /**
     * @var \Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="theme_id", referencedColumnName="id_theme")
     * })
     */
    private $theme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MotCle", inversedBy="livre")
     * @ORM\JoinTable(name="mot_cle_livre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="livre_id", referencedColumnName="id_livre")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="mot_cle_id", referencedColumnName="id_mot_cle")
     *   }
     * )
     */
    private $motCle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->motCle = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdLivre(): ?int
    {
        return $this->idLivre;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbrePages(): ?int
    {
        return $this->nbrePages;
    }

    public function setNbrePages(int $nbrePages): self
    {
        $this->nbrePages = $nbrePages;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getCouverture()
    {
        return $this->couverture;
    }

    public function setCouverture( $couverture): self
    {
        $this->couverture = $couverture;

        return $this;
    }

    public function getLienTelechargement(): ?string
    {
        return $this->lienTelechargement;
    }

    public function setLienTelechargement(?string $lienTelechargement): self
    {
        $this->lienTelechargement = $lienTelechargement;

        return $this;
    }

    public function getNbreTelechargement(): ?string
    {
        return $this->nbreTelechargement;
    }

    public function setNbreTelechargement(string $nbreTelechargement): self
    {
        $this->nbreTelechargement = $nbreTelechargement;

        return $this;
    }

    public function getEtatLivre(): ?string
    {
        return $this->etatLivre;
    }

    public function setEtatLivre(string $etatLivre): self
    {
        $this->etatLivre = $etatLivre;

        return $this;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getMaisonEdt()
    {
        return $this->maisonEdt;
    }

    public function setMaisonEdt(?MaisonEdt $maisonEdt)
    {
        $this->maisonEdt = $maisonEdt;

        return $this;
    }

    public function getTheme()
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection|MotCle[]
     */
    public function getMotCle(): Collection
    {
        return $this->motCle;
    }

    public function addMotCle(MotCle $motCle): self
    {
        if (!$this->motCle->contains($motCle)) {
            $this->motCle[] = $motCle;
        }

        return $this;
    }

    public function removeMotCle(MotCle $motCle): self
    {
        if ($this->motCle->contains($motCle)) {
            $this->motCle->removeElement($motCle);
        }

        return $this;
    }

}
