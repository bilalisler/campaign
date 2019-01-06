<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="product_property", columns={"product_id"}), @ORM\Index(name="shop_id", columns={"shop_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\MessagesRepository")
 */
class Messages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=200, nullable=true)
     */
    private $subject = null;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="is_read", type="smallint", nullable=true)
     */
    private $isRead = 0;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sender_user_id", referencedColumnName="id")
     * })
     */
    private $senderUserId;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="App\Entity\Messages", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id",onDelete="cascade")
     * })
     */
    private $product;

    /**
     * @var ShopProfile
     *
     * @ORM\ManyToOne(targetEntity="ShopProfile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function __construct()
    {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return Products|null
     */
    public function getProduct(): ?Products
    {
        return $this->product;
    }

    /**
     * @param Products $product
     */
    public function setProduct(Products $product): void
    {
        $this->product = $product;
    }

    /**
     * @return ShopProfile|null
     */
    public function getShop(): ?ShopProfile
    {
        return $this->shop;
    }

    /**
     * @param ShopProfile $shop
     */
    public function setShop(ShopProfile $shop): void
    {
        $this->shop = $shop;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int|null
     */
    public function getisRead(): ?int
    {
        return $this->isRead;
    }

    /**
     * @param int $isRead
     */
    public function setIsRead(int $isRead): void
    {
        $this->isRead = $isRead;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return User
     */
    public function getSenderUserId(): User
    {
        return $this->senderUserId;
    }

    /**
     * @param User $senderUserId
     */
    public function setSenderUserId(User $senderUserId): void
    {
        $this->senderUserId = $senderUserId;
    }


}
