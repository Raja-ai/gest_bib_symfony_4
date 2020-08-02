<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_theme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTheme;

    /**
     * @var string
     *
     * @ORM\Column(name="design_theme", type="string", length=50, nullable=false)
     */
    private $designTheme;

    public function getIdTheme(): ?int
    {
        return $this->idTheme;
    }

    public function getDesignTheme(): ?string
    {
        return $this->designTheme;
    }

    public function setDesignTheme(string $designTheme): self
    {
        $this->designTheme = $designTheme;

        return $this;
    }


}
