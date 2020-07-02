<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Topic
 *
 * @ORM\Table(name="topic", uniqueConstraints={@ORM\UniqueConstraint(name="idtopic_UNIQUE", columns={"idtopic"})})
 * @ORM\Entity
 * @ApiResource
 */
class Topic
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtopic", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtopic;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    public function getIdtopic(): ?int
    {
        return $this->idtopic;
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


}
