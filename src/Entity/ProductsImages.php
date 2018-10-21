<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImages
 *
 * @ORM\Table(name="products_images", indexes={@ORM\Index(name="product_fk", columns={"product_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProductsImagesRepository")
 */
class ProductsImages
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
     * @var string|null
     *
     * @ORM\Column(name="pimg_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $pimgName = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="pimg_extension", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $pimgExtension = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="pimg_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $pimgType = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="created_at", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $createdAt = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="updated_at", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $updatedAt = 'NULL';

    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getPimgName(): ?string
    {
        return $this->pimgName;
    }

    /**
     * @param null|string $pimgName
     */
    public function setPimgName(?string $pimgName): void
    {
        $this->pimgName = $pimgName;
    }

    /**
     * @return null|string
     */
    public function getPimgExtension(): ?string
    {
        return $this->pimgExtension;
    }

    /**
     * @param null|string $pimgExtension
     */
    public function setPimgExtension(?string $pimgExtension): void
    {
        $this->pimgExtension = $pimgExtension;
    }

    /**
     * @return int|null
     */
    public function getPimgType(): ?int
    {
        return $this->pimgType;
    }

    /**
     * @param int|null $pimgType
     */
    public function setPimgType(?int $pimgType): void
    {
        $this->pimgType = $pimgType;
    }

    /**
     * @return null|string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param null|string $createdAt
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return null|string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param null|string $updatedAt
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Products
     */
    public function getProduct(): Products
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

}
