<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="place", uniqueConstraints={@ORM\UniqueConstraint(name="idplace_UNIQUE", columns={"idplace"}), @ORM\UniqueConstraint(name="place_UNIQUE", columns={"place"})})
 * @ORM\Entity
 */
class Place
{
    /**
     * @var int
     *
     * @ORM\Column(name="idplace", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplace;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=45, nullable=false)
     */
    private $place;

    public function getIdplace(): ?int
    {
        return $this->idplace;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }


}
