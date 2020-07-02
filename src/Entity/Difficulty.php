<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Difficulty
 *
 * @ORM\Table(name="difficulty", uniqueConstraints={@ORM\UniqueConstraint(name="iddifficulty_UNIQUE", columns={"iddifficulty"})})
 * @ORM\Entity
 * @ApiResource
 */
class Difficulty
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddifficulty", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     */
    private $iddifficulty;

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="string", length=45, nullable=false)
     * @Groups({"module"})
     */
    private $level;

    public function getIddifficulty(): ?int
    {
        return $this->iddifficulty;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }


}
