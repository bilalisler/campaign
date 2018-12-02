<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="plate",type="integer",length=5,nullable=true)
     */
    private $plate;

    /**
     * @ORM\Column(name="city_name",type="string",length=100,nullable=true)
     */
    private $cityName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Town",mappedBy="city")
     */
    private $towns;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTowns(){
        return $this->towns;
    }

    public function getPlate(): ?int
    {
        return $this->plate;
    }

    public function setPlate(?int $plate): self
    {
        $this->plate = $plate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param mixed $cityName
     */
    public function setCityName($cityName): void
    {
        $this->cityName = $cityName;
    }


}
