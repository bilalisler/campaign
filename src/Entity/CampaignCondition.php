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
     * @return string
     */
    public function getConditions(): string
    {
        return $this->conditions;
    }

    /**
     * @param string $conditions
     */
    public function setConditions(string $conditions): void
    {
        $this->conditions = $conditions;
    }


}
