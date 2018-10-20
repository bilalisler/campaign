<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopProfile
 *
 * @ORM\Table(name="shop_profile")
 * @ORM\Entity
 */
class ShopProfile
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
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=120, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $address = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true, options={"default"="NULL"})
     */
    private $phone = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="city", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $city = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="town", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $town = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="Latitude", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $latitude = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="Longitude", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $longitude = 'NULL';


}
