<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Forum::class, inversedBy="characters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $forum;

    /**
     * @ORM\OneToMany(targetEntity=Rp::class, mappedBy="character_id", orphanRemoval=true)
     */
    private $rps;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

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

    public function getForum(): ?Forum
    {
        return $this->forum;
    }

    public function setForum(?Forum $forum): self
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * @return Collection|Rp[]
     */
    public function getRps(): Collection
    {
        return $this->rps;
    }

    public function addRp(Rp $rp): self
    {
        if (!$this->rps->contains($rp)) {
            $this->rps[] = $rp;
            $rp->setCharacterId($this);
        }

        return $this;
    }

    public function removeRp(Rp $rp): self
    {
        if ($this->rps->contains($rp)) {
            $this->rps->removeElement($rp);
            // set the owning side to null (unless already changed)
            if ($rp->getCharacterId() === $this) {
                $rp->setCharacterId(null);
            }
        }

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }
}
