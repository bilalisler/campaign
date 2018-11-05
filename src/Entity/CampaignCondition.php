<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignCondition
 *
 * @ORM\Table(name="campaign_condition")
 * @ORM\Entity(repositoryClass="App\Repository\CampaignConditionRepository")
 */
class CampaignCondition
{
    public function __toString() {
        return 'campaign Condition';
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
     * @var string
     *
     * @ORM\Column(name="conditions", type="json_array", nullable=false)
     */
    private $conditions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ShopProfile",inversedBy="campaignCondition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     * })
     */
    private $shop;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * @param array $conditions
     */
    public function setConditions(array $conditions)
    {
        $this->conditions = $conditions;
    }


}
