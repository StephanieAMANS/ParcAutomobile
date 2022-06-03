<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $code;

    /**
     * @ORM\ManyToMany(targetEntity=Reservation::class, mappedBy="sites")
     */
    private $reservations;

    /**
     * @ORM\ManyToMany(targetEntity=Car::class, mappedBy="sites")
     */
    private $cars;

    /**
     * @ORM\OneToMany(targetEntity=Personel::class, mappedBy="site")
     */
    private $personels;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->cars = new ArrayCollection();
        $this->personels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->addSite($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeSite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Car>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->addSite($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->removeElement($car)) {
            $car->removeSite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Personel>
     */
    public function getPersonels(): Collection
    {
        return $this->personels;
    }

    public function addPersonel(Personel $personel): self
    {
        if (!$this->personels->contains($personel)) {
            $this->personels[] = $personel;
            $personel->setSite($this);
        }

        return $this;
    }

    public function removePersonel(Personel $personel): self
    {
        if ($this->personels->removeElement($personel)) {
            // set the owning side to null (unless already changed)
            if ($personel->getSite() === $this) {
                $personel->setSite(null);
            }
        }

        return $this;
    }
}
