<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="brand_property", columns={"brand_id"}), @ORM\Index(name="shop_property", columns={"shop_id"}), @ORM\Index(name="category_property", columns={"category_id"})})
 * @ORM\Entity
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


}
