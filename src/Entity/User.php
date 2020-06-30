<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_user_topic1_idx", columns={"topic_idtopic"}), @ORM\Index(name="fk_user_user_type_idx", columns={"iduser_type"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firtname", type="string", length=45, nullable=false)
     */
    private $firtname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     */
    private $birthday;

    /**
     * @var \Topic
     *
     * @ORM\ManyToOne(targetEntity="Topic")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="topic_idtopic", referencedColumnName="idtopic")
     * })
     */
    private $topicIdtopic;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser_type", referencedColumnName="iduser_type")
     * })
     */
    private $iduserType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Session", mappedBy="userIduser")
     */
    private $sessionIdsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sessionIdsession = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
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

    public function getFirtname(): ?string
    {
        return $this->firtname;
    }

    public function setFirtname(string $firtname): self
    {
        $this->firtname = $firtname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getTopicIdtopic(): ?Topic
    {
        return $this->topicIdtopic;
    }

    public function setTopicIdtopic(?Topic $topicIdtopic): self
    {
        $this->topicIdtopic = $topicIdtopic;

        return $this;
    }

    public function getIduserType(): ?UserType
    {
        return $this->iduserType;
    }

    public function setIduserType(?UserType $iduserType): self
    {
        $this->iduserType = $iduserType;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessionIdsession(): Collection
    {
        return $this->sessionIdsession;
    }

    public function addSessionIdsession(Session $sessionIdsession): self
    {
        if (!$this->sessionIdsession->contains($sessionIdsession)) {
            $this->sessionIdsession[] = $sessionIdsession;
            $sessionIdsession->addUserIduser($this);
        }

        return $this;
    }

    public function removeSessionIdsession(Session $sessionIdsession): self
    {
        if ($this->sessionIdsession->contains($sessionIdsession)) {
            $this->sessionIdsession->removeElement($sessionIdsession);
            $sessionIdsession->removeUserIduser($this);
        }

        return $this;
    }

}
