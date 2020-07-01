<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 * @ApiResource
 * @ORM\Table(name="module", uniqueConstraints={@ORM\UniqueConstraint(name="idmodule_UNIQUE", columns={"idmodule"})}, indexes={@ORM\Index(name="fk_module_difficulty1_idx", columns={"iddifficulty"}), @ORM\Index(name="fk_module_image1_idx", columns={"idimage"}), @ORM\Index(name="fk_module_topic1_idx", columns={"idtopic"})})
 * @ORM\Entity
 */
class Module
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmodule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ApiResource()
     */
    private $idmodule;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \Difficulty
     *
     * @ORM\ManyToOne(targetEntity="Difficulty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddifficulty", referencedColumnName="iddifficulty")
     * })
     */
    private $iddifficulty;

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idimage", referencedColumnName="idimage")
     * })
     */
    private $idimage;

    /**
     * @var \Topic
     *
     * @ORM\ManyToOne(targetEntity="Topic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtopic", referencedColumnName="idtopic")
     * })
     */
    private $idtopic;

    public function getIdmodule(): ?int
    {
        return $this->idmodule;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIddifficulty(): ?Difficulty
    {
        return $this->iddifficulty;
    }

    public function setIddifficulty(?Difficulty $iddifficulty): self
    {
        $this->iddifficulty = $iddifficulty;

        return $this;
    }

    public function getIdimage(): ?Image
    {
        return $this->idimage;
    }

    public function setIdimage(?Image $idimage): self
    {
        $this->idimage = $idimage;

        return $this;
    }

    public function getIdtopic(): ?Topic
    {
        return $this->idtopic;
    }

    public function setIdtopic(?Topic $idtopic): self
    {
        $this->idtopic = $idtopic;

        return $this;
    }
}
