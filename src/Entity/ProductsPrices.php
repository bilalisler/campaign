<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsPrices
 *
 * @ORM\Table(name="products_prices")
 * @ORM\Entity(repositoryClass="App\Repository\ProductsPricesRepository")
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
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     */
    public function setProductId(?int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return int|null
     */
    public function getCampaignId(): ?int
    {
        return $this->campaignId;
    }

    /**
     * @param int|null $campaignId
     */
    public function setCampaignId(?int $campaignId): void
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @return null|string
     */
    public function getBuyPrice(): ?string
    {
        return $this->buyPrice;
    }

    /**
     * @param null|string $buyPrice
     */
    public function setBuyPrice(?string $buyPrice): void
    {
        $this->buyPrice = $buyPrice;
    }

    /**
     * @return null|string
     */
    public function getSell(): ?string
    {
        return $this->sell;
    }

    /**
     * @param null|string $sell
     */
    public function setSell(?string $sell): void
    {
        $this->sell = $sell;
    }

    /**
     * @return null|string
     */
    public function getTaxPrice(): ?string
    {
        return $this->taxPrice;
    }

    /**
     * @param null|string $taxPrice
     */
    public function setTaxPrice(?string $taxPrice): void
    {
        $this->taxPrice = $taxPrice;
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
