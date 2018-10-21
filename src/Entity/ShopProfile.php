<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopProfile
 *
 * @ORM\Table(name="shop_profile", indexes={@ORM\Index(name="user_fk", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ShopProfileRepository")
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

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

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
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param null|string $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return null|string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param null|string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int|null
     */
    public function getCity(): ?int
    {
        return $this->city;
    }

    /**
     * @param int|null $city
     */
    public function setCity(?int $city): void
    {
        $this->city = $city;
    }

    /**
     * @return int|null
     */
    public function getTown(): ?int
    {
        return $this->town;
    }

    /**
     * @param int|null $town
     */
    public function setTown(?int $town): void
    {
        $this->town = $town;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float|null $latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float|null $longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }



}
