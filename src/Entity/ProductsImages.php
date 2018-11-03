<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * ProductsImages
 * @Vich\Uploadable
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
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="status", nullable=true, type="boolean")
     */
    private $status;

    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products", inversedBy="productImages")
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
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     */
    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Products
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
     * @param File|null $image
     * @return ProductsImages
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $image
     * @return ProductsImages
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
