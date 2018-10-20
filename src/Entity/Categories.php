<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
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


}
