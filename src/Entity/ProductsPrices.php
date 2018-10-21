<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsPrices
 *
 * @ORM\Table(name="products_prices", indexes={@ORM\Index(name="campaign_fk", columns={"campaign_id"}), @ORM\Index(name="product_id_fk", columns={"product_id"})})
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

    /**
     * @var Campaigns
     *
     * @ORM\ManyToOne(targetEntity="Campaigns")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     * })
     */
    private $campaign;

    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
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
     * @return Campaigns
     */
    public function getCampaign(): Campaigns
    {
        return $this->campaign;
    }

    /**
     * @param Campaigns $campaign
     */
    public function setCampaign(Campaigns $campaign): void
    {
        $this->campaign = $campaign;
    }

    /**
     * @return Products
     */
    public function getProduct(): Products
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
