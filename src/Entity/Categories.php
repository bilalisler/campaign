<?php

namespace App\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Categories
 * @Vich\Uploadable
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\Column(name="image", type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="category_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function __toString() {
        return (string)$this->categoryName;
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
     * One Category has Many Categories.
     * @ORM\OneToMany(targetEntity="App\Entity\Categories", mappedBy="parent")
     */
    private $children;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="App\Entity\Products", inversedBy="categories")
     * @ORM\JoinTable(name="categories_products")
     */
    private $products;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryName = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subname", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categorySubname = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryDescription = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="c_order", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $categoryOrder = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categorySlug = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="c_status", type="integer", nullable=true, options={"default"=1})
     */
    private $categoryStatus = 1;

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


    public function __construct() {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return null|string
     */
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param null|string $categoryName
     */
    public function setCategoryName(?string $categoryName): void
    {
        $this->categoryName = $categoryName;

        $slugify = new Slugify();
        $this->setCategorySlug($slugify->slugify($categoryName));
    }

    /**
     * @return null|string
     */
    public function getCategorySubname(): ?string
    {
        return $this->categorySubname;
    }

    /**
     * @param null|string $categorySubname
     */
    public function setCategorySubname(?string $categorySubname): void
    {
        $this->categorySubname = $categorySubname;
    }

    /**
     * @return null|string
     */
    public function getCategoryDescription(): ?string
    {
        return $this->categoryDescription;
    }

    /**
     * @param null|string $categoryDescription
     */
    public function setCategoryDescription(?string $categoryDescription): void
    {
        $this->categoryDescription = $categoryDescription;
    }

    /**
     * @return int|null
     */
    public function getCategoryOrder(): ?int
    {
        return $this->categoryOrder;
    }

    /**
     * @param int|null $categoryOrder
     */
    public function setCategoryOrder(?int $categoryOrder): void
    {
        $this->categoryOrder = $categoryOrder;
    }

    /**
     * @return null|string
     */
    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }

    /**
     * @param null|string $categorySlug
     */
    public function setCategorySlug(?string $categorySlug): void
    {
        $this->categorySlug = $categorySlug;
    }

    /**
     * @return int|null
     */
    public function getCategoryStatus(): ?int
    {
        return $this->categoryStatus;
    }

    /**
     * @param int|null $categoryStatus
     */
    public function setCategoryStatus(?int $categoryStatus): void
    {
        $this->categoryStatus = $categoryStatus;
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
