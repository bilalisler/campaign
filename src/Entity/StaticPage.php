<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="static_page")
 * @ORM\Entity(repositoryClass="App\Repository\StaticPageRepository")
 */
class StaticPage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     * @var string|null
     */
    private $slug;


    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @var string|null
     */
    private $title;


    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     * @var string|null
     */
    private $content;


    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @var \DateTime|null
     */
    private $createdAt;


    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @var \DateTime|null
     */
    private $updatedAt;



    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param null|string $slug
     * @return StaticPage
     */
    public function setSlug(?string $slug): StaticPage
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return StaticPage
     */
    public function setTitle(?string $title): StaticPage
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param null|string $content
     * @return StaticPage
     */
    public function setContent(?string $content): StaticPage
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     * @return StaticPage
     */
    public function setCreatedAt(?\DateTime $createdAt): StaticPage
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     * @return StaticPage
     */
    public function setUpdatedAt(?\DateTime $updatedAt): StaticPage
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }



}
