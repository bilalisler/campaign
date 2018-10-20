<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsImages
 *
 * @ORM\Table(name="products_images")
 * @ORM\Entity
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
     * @var int|null
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $productId = 'NULL';

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


}
