<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", uniqueConstraints={@ORM\UniqueConstraint(name="idtest_UNIQUE", columns={"idtest"})}, indexes={@ORM\Index(name="fk_test_question1_idx", columns={"idquestion"})})
 * @ORM\Entity
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtest", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idtest;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \Question
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idquestion", referencedColumnName="idquestion")
     * })
     */
    private $idquestion;

    public function getIdtest(): ?int
    {
        return $this->idtest;
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

    public function getIdquestion(): ?Question
    {
        return $this->idquestion;
    }

    public function setIdquestion(?Question $idquestion): self
    {
        $this->idquestion = $idquestion;

        return $this;
    }


}
