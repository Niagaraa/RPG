<?php

namespace App\Entity;

use App\Repository\RpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RpRepository::class)
 */
class Rp
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $partner;

    /**
     * @ORM\Column(type="date")
     */
    private $lastAnswer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mustAnswering;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEvent;

    /**
     * @ORM\ManyToOne(targetEntity=Character::class, inversedBy="rps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $character_id;

    /**
     * @ORM\ManyToOne(targetEntity=Forum::class, inversedBy="rps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $forum_id;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPartner(): ?string
    {
        return $this->partner;
    }

    public function setPartner(string $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastAnswer()
    {
        return $this->lastAnswer;
    }

    /**
     * @param mixed $lastAnswer
     */
    public function setLastAnswer($lastAnswer): void
    {
        $this->lastAnswer = $lastAnswer;
    }

    /**
     * @return mixed
     */
    public function getMustAnswering()
    {
        return $this->mustAnswering;
    }

    /**
     * @param mixed $mustAnswering
     */
    public function setMustAnswering($mustAnswering): void
    {
        $this->mustAnswering = $mustAnswering;
    }

    public function getIsEvent(): ?bool
    {
        return $this->isEvent;
    }

    public function setIsEvent(bool $isEvent): self
    {
        $this->isEvent = $isEvent;

        return $this;
    }

    public function getCharacterId(): ?Character
    {
        return $this->character_id;
    }

    public function setCharacterId(?Character $character_id): self
    {
        $this->character_id = $character_id;

        return $this;
    }

    public function getForumId(): ?Forum
    {
        return $this->forum_id;
    }

    public function setForumId(?Forum $forum_id): self
    {
        $this->forum_id = $forum_id;

        return $this;
    }
}
