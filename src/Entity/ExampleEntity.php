<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExampleEntityRepository")
 */
class ExampleEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Color")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Shape")
     */
    private $shapes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Size")
     * @ORM\JoinColumn(nullable=false)
     */
    private $size;

    public function __construct()
    {
        $this->colors = new ArrayCollection();
        $this->shapes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Color[]
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(Color $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
        }

        return $this;
    }

    public function removeColor(Color $color): self
    {
        if ($this->colors->contains($color)) {
            $this->colors->removeElement($color);
        }

        return $this;
    }

    /**
     * @return Collection|Shape[]
     */
    public function getShapes(): Collection
    {
        return $this->shapes;
    }

    public function addShape(Shape $shape): self
    {
        if (!$this->shapes->contains($shape)) {
            $this->shapes[] = $shape;
        }

        return $this;
    }

    public function removeShape(Shape $shape): self
    {
        if ($this->shapes->contains($shape)) {
            $this->shapes->removeElement($shape);
        }

        return $this;
    }

    public function getSize(): ?Size
    {
        return $this->size;
    }

    public function setSize(?Size $size): self
    {
        $this->size = $size;

        return $this;
    }
}
