<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="brand_property", columns={"brand_id"}), @ORM\Index(name="shop_property", columns={"shop_id"}), @ORM\Index(name="category_property", columns={"category_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
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
     * @ORM\Column(name="slug", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $slug = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $code = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock", type="smallint", nullable=true)
     */
    private $stock = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sub_description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $subDescription = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="metatags", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $metatags = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="metakeys", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $metakeys = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="smallint", nullable=true, options={"default"="NULL"})
     */
    private $status = 'NULL';

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=false, options={"default"="1"})
     */
    private $isactive = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="isDelete", type="boolean", nullable=false)
     */
    private $isdelete = '0';

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
     * @var ProductsBrands
     *
     * @ORM\ManyToOne(targetEntity="ProductsBrands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $brand;

    /**
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var ShopProfile
     *
     * @ORM\ManyToOne(targetEntity="ShopProfile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;


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
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param null|string $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param int|null $stock
     */
    public function setStock(?int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return null|string
     */
    public function getSubDescription(): ?string
    {
        return $this->subDescription;
    }

    /**
     * @param null|string $subDescription
     */
    public function setSubDescription(?string $subDescription): void
    {
        $this->subDescription = $subDescription;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getMetatags(): ?string
    {
        return $this->metatags;
    }

    /**
     * @param null|string $metatags
     */
    public function setMetatags(?string $metatags): void
    {
        $this->metatags = $metatags;
    }

    /**
     * @return null|string
     */
    public function getMetakeys(): ?string
    {
        return $this->metakeys;
    }

    /**
     * @param null|string $metakeys
     */
    public function setMetakeys(?string $metakeys): void
    {
        $this->metakeys = $metakeys;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isIsactive(): bool
    {
        return $this->isactive;
    }

    /**
     * @param bool $isactive
     */
    public function setIsactive(bool $isactive): void
    {
        $this->isactive = $isactive;
    }

    /**
     * @return bool
     */
    public function isIsdelete(): bool
    {
        return $this->isdelete;
    }

    /**
     * @param bool $isdelete
     */
    public function setIsdelete(bool $isdelete): void
    {
        $this->isdelete = $isdelete;
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
     * @return ProductsBrands
     */
    public function getBrand(): ProductsBrands
    {
        return $this->brand;
    }

    /**
     * @param ProductsBrands $brand
     */
    public function setBrand(ProductsBrands $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return Categories
     */
    public function getCategory(): Categories
    {
        return $this->category;
    }

    /**
     * @param Categories $category
     */
    public function setCategory(Categories $category): void
    {
        $this->category = $category;
    }

    /**
     * @return ShopProfile
     */
    public function getShop(): ShopProfile
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



}
