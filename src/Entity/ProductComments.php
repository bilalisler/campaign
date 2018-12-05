<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductCommentsRepository")
 */
class ProductComments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="product", type="integer",nullable=true, options={"default"="NULL"})
     */
    private $product;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $email = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="text", nullable=true, options={"default"="NULL"})
     */
    private $comment = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_address", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $ipAddress = null;

    /**
     * @var \DateTime|null
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt = null;

    /**
     * One Comment has Many Comments.
     * @ORM\OneToMany(targetEntity="App\Entity\ProductComments", mappedBy="parent")
     */
    private $children;

    /**
     * Many Comments have One Comment.
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductComments", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children): void
    {
        $this->children = $children;
    }

    /**
     * @return null|string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param null|string $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return null|string
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * @param null|string $ipAddress
     */
    public function setIpAddress(?string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
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
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getProduct(): ?int
    {
        return $this->product;
    }

    /**
     * @param int|null $product
     */
    public function setProduct(?int $product): void
    {
        $this->product = $product;
    }






}
