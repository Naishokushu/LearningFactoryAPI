<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session", uniqueConstraints={@ORM\UniqueConstraint(name="idsession_UNIQUE", columns={"idsession"})}, indexes={@ORM\Index(name="fk_session_module1_idx", columns={"idmodule"}), @ORM\Index(name="fk_session_place1_idx", columns={"idplace"}), @ORM\Index(name="fk_session_test1_idx", columns={"idtest"}), @ORM\Index(name="fk_session_user1_idx", columns={"idmanager"}), @ORM\Index(name="fk_session_user2_idx", columns={"idowner"})})
 * @ORM\Entity
 */
class Session
{
    /**
     * @var int
     *
     * @ORM\Column(name="idsession", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsession;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="last", type="integer", nullable=false)
     */
    private $last;

    /**
     * @var \Module
     *
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmodule", referencedColumnName="idmodule")
     * })
     */
    private $idmodule;

    /**
     * @var \Place
     *
     * @ORM\ManyToOne(targetEntity="Place")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idplace", referencedColumnName="idplace")
     * })
     */
    private $idplace;

    /**
     * @var \Test
     *
     * @ORM\ManyToOne(targetEntity="Test")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtest", referencedColumnName="idtest")
     * })
     */
    private $idtest;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmanager", referencedColumnName="iduser")
     * })
     */
    private $idmanager;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idowner", referencedColumnName="iduser")
     * })
     */
    private $idowner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="sessionIdsession")
     * @ORM\JoinTable(name="join",
     *   joinColumns={
     *     @ORM\JoinColumn(name="session_idsession", referencedColumnName="idsession")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_iduser", referencedColumnName="iduser")
     *   }
     * )
     */
    private $userIduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userIduser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdsession(): ?int
    {
        return $this->idsession;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLast(): ?int
    {
        return $this->last;
    }

    public function setLast(int $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function getIdmodule(): ?Module
    {
        return $this->idmodule;
    }

    public function setIdmodule(?Module $idmodule): self
    {
        $this->idmodule = $idmodule;

        return $this;
    }

    public function getIdplace(): ?Place
    {
        return $this->idplace;
    }

    public function setIdplace(?Place $idplace): self
    {
        $this->idplace = $idplace;

        return $this;
    }

    public function getIdtest(): ?Test
    {
        return $this->idtest;
    }

    public function setIdtest(?Test $idtest): self
    {
        $this->idtest = $idtest;

        return $this;
    }

    public function getIdmanager(): ?User
    {
        return $this->idmanager;
    }

    public function setIdmanager(?User $idmanager): self
    {
        $this->idmanager = $idmanager;

        return $this;
    }

    public function getIdowner(): ?User
    {
        return $this->idowner;
    }

    public function setIdowner(?User $idowner): self
    {
        $this->idowner = $idowner;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserIduser(): Collection
    {
        return $this->userIduser;
    }

    public function addUserIduser(User $userIduser): self
    {
        if (!$this->userIduser->contains($userIduser)) {
            $this->userIduser[] = $userIduser;
        }

        return $this;
    }

    public function removeUserIduser(User $userIduser): self
    {
        if ($this->userIduser->contains($userIduser)) {
            $this->userIduser->removeElement($userIduser);
        }

        return $this;
    }

}
