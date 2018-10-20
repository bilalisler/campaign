<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CampaignCondition
 *
 * @ORM\Table(name="campaign_condition")
 * @ORM\Entity
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


}
