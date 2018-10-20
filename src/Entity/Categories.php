<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
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
     * @var int|null
     *
     * @ORM\Column(name="lang_id", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $langId = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $parentId = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryName = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_subname", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categorySubname = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryDescription = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_order", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $categoryOrder = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_url", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryUrl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="category_image", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $categoryImage = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="category_status", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $categoryStatus = 'NULL';

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
     * @return int|null
     */
    public function getLangId(): ?int
    {
        return $this->langId;
    }

    /**
     * @param int|null $langId
     */
    public function setLangId(?int $langId): void
    {
        $this->langId = $langId;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     */
    public function setParentId(?int $parentId): void
    {
        $this->parentId = $parentId;
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
    public function getCategoryUrl(): ?string
    {
        return $this->categoryUrl;
    }

    /**
     * @param null|string $categoryUrl
     */
    public function setCategoryUrl(?string $categoryUrl): void
    {
        $this->categoryUrl = $categoryUrl;
    }

    /**
     * @return null|string
     */
    public function getCategoryImage(): ?string
    {
        return $this->categoryImage;
    }

    /**
     * @param null|string $categoryImage
     */
    public function setCategoryImage(?string $categoryImage): void
    {
        $this->categoryImage = $categoryImage;
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
}
