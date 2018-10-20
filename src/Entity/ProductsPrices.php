<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsPrices
 *
 * @ORM\Table(name="products_prices")
 * @ORM\Entity
 */
class ProductsPrices
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
     * @var int|null
     *
     * @ORM\Column(name="campaign_id", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $campaignId = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="buy_price", type="decimal", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $buyPrice = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sell", type="decimal", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $sell = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="tax_price", type="decimal", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $taxPrice = 'NULL';

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
