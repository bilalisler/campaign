<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsBrands
 *
 * @ORM\Table(name="products_brands")
 * @ORM\Entity(repositoryClass="App\Repository\ProductsBrandsRepository")
 */
class ProductsBrands
{
    public function __toString()
    {
        return (string)$this->brandName;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $brandName = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true, options={"default"=1})
     */
    private $brandStatus = 1;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", length=255, nullable=true)
     */
    private $createdAt = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", length=255, nullable=true)
     */
    private $updatedAt = null;


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
     * @return null|string
     */
    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    /**
     * @param null|string $brandName
     */
    public function setBrandName(?string $brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * @return int|null
     */
    public function getBrandStatus(): ?int
    {
        return $this->brandStatus;
    }

    /**
     * @param int|null $brandStatus
     */
    public function setBrandStatus(?int $brandStatus): void
    {
        $this->brandStatus = $brandStatus;
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
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
