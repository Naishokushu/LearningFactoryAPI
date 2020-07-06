<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ModuleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"module"}, "enable_max_depth"=true}
 * )
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"module"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"module"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"module"})
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Topic::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $topic;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="modules")
     * @Groups({"module"})
     * 
     */
    private $difficulty;

    /**
     * @ORM\ManyToOne(targetEntity=Image::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTopic(): ?topic
    {
        return $this->topic;
    }

    public function setTopic(?topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getDifficulty(): ?difficulty
    {
        return $this->difficulty;
    }

    public function setDifficulty(?difficulty $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getImage(): ?image
    {
        return $this->image;
    }

    public function setImage(?image $image): self
    {
        $this->image = $image;

        return $this;
    }
}
