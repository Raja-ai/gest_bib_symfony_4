<?php

namespace App\Entity;

use App\Repository\MaisonEdtRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MaisonEdt
 *
 * @ORM\Table(name="maison_edt")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=MaisonEdtRepository::class)
 */
class MaisonEdt
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_maison_edt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaisonEdt;

    /**
     * @var string
     *
     * @ORM\Column(name="design_maison_edt", type="string", length=50, nullable=false)
     */
    private $designMaisonEdt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adresse = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true, options={"default"="NULL"})
     * @Assert\Email  
     */
    private $email = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site_web", type="string", length=100, nullable=true, options={"default"="NULL"})
     * @Assert\Url(
     * relativeProtocol = true
     * )
     */
    private $siteWeb = NULL;

    public function getIdMaisonEdt(): ?int
    {
        return $this->idMaisonEdt;
    }

    public function getDesignMaisonEdt(): ?string
    {
        return $this->designMaisonEdt;
    }

    public function setDesignMaisonEdt(string $designMaisonEdt): self
    {
        $this->designMaisonEdt = $designMaisonEdt;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(?string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }


}
