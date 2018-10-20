<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsBrands
 *
 * @ORM\Table(name="products_brands")
 * @ORM\Entity
 */
class ProductsBrands
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
     * @ORM\Column(name="brand_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $brandName = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="brand_status", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $brandStatus = 'NULL';

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
