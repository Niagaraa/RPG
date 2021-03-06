<?php

namespace App\Entity;

use App\Repository\ForumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ForumRepository::class)
 */
class Forum
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $button;

    /**
     * @ORM\OneToMany(targetEntity=Character::class, mappedBy="forum", orphanRemoval=true)
     */
    private $characters;

    /**
     * @ORM\OneToMany(targetEntity=Rp::class, mappedBy="forum_id", orphanRemoval=true)
     */
    private $rps;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getButton(): ?string
    {
        return $this->button;
    }

    public function setButton(?string $button): self
    {
        $this->button = $button;

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setForum($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            // set the owning side to null (unless already changed)
            if ($character->getForum() === $this) {
                $character->setForum(null);
            }
        }

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
            $rp->setForumId($this);
        }

        return $this;
    }

    public function removeRp(Rp $rp): self
    {
        if ($this->rps->contains($rp)) {
            $this->rps->removeElement($rp);
            // set the owning side to null (unless already changed)
            if ($rp->getForumId() === $this) {
                $rp->setForumId(null);
            }
        }

        return $this;
    }
}
