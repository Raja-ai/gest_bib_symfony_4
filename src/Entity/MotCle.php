<?php

namespace App\Entity;

use App\Repository\MotCleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MotCle
 *
 * @ORM\Table(name="mot_cle")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=MotCleRepository::class)
 */
class MotCle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mot_cle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMotCle;

    /**
     * @var string
     *
     * @ORM\Column(name="design_mot_cle", type="string", length=50, nullable=false)
     */
    private $designMotCle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Livre", mappedBy="motCle")
     */
    private $livre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdMotCle(): ?int
    {
        return $this->idMotCle;
    }

    public function getDesignMotCle(): ?string
    {
        return $this->designMotCle;
    }

    public function setDesignMotCle(string $designMotCle): self
    {
        $this->designMotCle = $designMotCle;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivre(): Collection
    {
        return $this->livre;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livre->contains($livre)) {
            $this->livre[] = $livre;
            $livre->addMotCle($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livre->contains($livre)) {
            $this->livre->removeElement($livre);
            $livre->removeMotCle($this);
        }

        return $this;
    }

}
