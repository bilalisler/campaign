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
     * @var float|null
     *
     * @ORM\Column(name="buy_price", type="float", nullable=true)
     */
    private $buyPrice = 0.0;

    /**
     * @var float|null
     *
     * @ORM\Column(name="sell", type="float", nullable=true)
     */
    private $sellPrice = 0.0;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tax_price", type="float", nullable=true)
     */
    private $taxPrice = 0.0;


    /**
     * @var float|null
     *
     * @ORM\Column(name="other_price", type="float", nullable=true)
     */
    private $otherPrice = 0.0;

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
     * @return float|null
     */
    public function getBuyPrice(): ?float
    {
        return $this->buyPrice;
    }

    /**
     * @param float|null $buyPrice
     */
    public function setBuyPrice(?float $buyPrice): void
    {
        $this->buyPrice = $buyPrice;
    }

    /**
     * @return float|null
     */
    public function getSellPrice(): ?float
    {
        return $this->sellPrice;
    }

    /**
     * @param float|null $sellPrice
     */
    public function setSellPrice(?float $sellPrice): void
    {
        $this->sellPrice = $sellPrice;
    }

    /**
     * @return float|null
     */
    public function getTaxPrice(): ?float
    {
        return $this->taxPrice;
    }

    /**
     * @param float|null $taxPrice
     */
    public function setTaxPrice(?float $taxPrice): void
    {
        $this->taxPrice = $taxPrice;
    }

    /**
     * @return float|null
     */
    public function getOtherPrice(): ?float
    {
        return $this->otherPrice;
    }

    /**
     * @param float|null $otherPrice
     */
    public function setOtherPrice(?float $otherPrice): void
    {
        $this->otherPrice = $otherPrice;
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

}
