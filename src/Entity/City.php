<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\Column(name="plate",type="integer",length=5,nullable=true,unique=true)
     */
    private $plate;

    /**
     * @ORM\Column(name="name",type="string",length=100,nullable=true)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug",type="string",length=100,nullable=true)
     */
    private $slug;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }


}
