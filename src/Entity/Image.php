<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Image
 *
 * @ORM\Table(name="image", uniqueConstraints={@ORM\UniqueConstraint(name="idimage_UNIQUE", columns={"idimage"})})
 * @ORM\Entity
 * @ApiResource
 * 
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="idimage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     */
    private $idimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     * @Groups({"module"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="string", length=250, nullable=true)
     * @Groups({"module"})
     */
    private $path;

    public function getIdimage(): ?int
    {
        return $this->idimage;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }


}
