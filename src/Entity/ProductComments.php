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
     * @var ProductComments
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Products",inversedBy="comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="user_id", type="integer", length=5, nullable=true, options={"default"="NULL"})
     */
    private $user = null;

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
     * @return ProductComments
     */
    public function getProduct(): ProductComments
    {
        return $this->product;
    }

    /**
     * @param ProductComments $product
     */
    public function setProduct(ProductComments $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int|null
     */
    public function getUser(): ?int
    {
        return $this->user;
    }

    /**
     * @param int|null $user
     */
    public function setUser(?int $user): void
    {
        $this->user = $user;
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




}
