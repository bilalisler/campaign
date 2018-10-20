<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaigns
 *
 * @ORM\Table(name="campaigns", indexes={@ORM\Index(name="campaign_condition_property", columns={"condition_id"}), @ORM\Index(name="campaign_category_property", columns={"category_id"}), @ORM\Index(name="campaign_product_property", columns={"product_id"}), @ORM\Index(name="campaign_shop_property", columns={"shop_id"})})
 * @ORM\Entity
 */
class Campaigns
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
     * @ORM\Column(name="campaign_name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $campaignName = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="campaign_description", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $campaignDescription = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="campaign_start_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $campaignStartDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="campaign_end_date", type="date", nullable=true, options={"default"="NULL"})
     */
    private $campaignEndDate = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $createdAt = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $updatedAt = 'NULL';

    /**
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var CampaignCondition
     *
     * @ORM\ManyToOne(targetEntity="CampaignCondition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="condition_id", referencedColumnName="id")
     * })
     */
    private $condition;

    /**
     * @var Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var ShopProfile
     *
     * @ORM\ManyToOne(targetEntity="ShopProfile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;


}
