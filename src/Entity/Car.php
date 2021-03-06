<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $matriculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kilometers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kilometersMax;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $rentalStartDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $estimatedRentalEndDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $reelRentalEndDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $MAJDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $monthlyCost;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fuelCard;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tollCard;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fiscalPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CO2Emission;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $GPS;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $regulator;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAvailable;

    /**
     * @ORM\ManyToMany(targetEntity=Reservation::class, mappedBy="cars")
     */
    private $reservations;

    /**
     * @ORM\ManyToMany(targetEntity=TypeCar::class, inversedBy="cars")
     */
    private $types;

    /**
     * @ORM\ManyToMany(targetEntity=Site::class, inversedBy="cars")
     */
    private $sites;

    /**
     * @ORM\ManyToOne(targetEntity=Personel::class, inversedBy="cars")
     */
    private $personel;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, inversedBy="cars")
     */
    private $teams;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->types = new ArrayCollection();
        $this->sites = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculation(): ?string
    {
        return $this->matriculation;
    }

    public function setMatriculation(string $matriculation): self
    {
        $this->matriculation = $matriculation;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(?int $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getKilometersMax(): ?int
    {
        return $this->kilometersMax;
    }

    public function setKilometersMax(?int $kilometersMax): self
    {
        $this->kilometersMax = $kilometersMax;

        return $this;
    }

    public function getRentalStartDate(): ?\DateTimeInterface
    {
        return $this->rentalStartDate;
    }

    public function setRentalStartDate(?\DateTimeInterface $rentalStartDate): self
    {
        $this->rentalStartDate = $rentalStartDate;

        return $this;
    }

    public function getEstimatedRentalEndDate(): ?\DateTimeInterface
    {
        return $this->estimatedRentalEndDate;
    }

    public function setEstimatedRentalEndDate(?\DateTimeInterface $estimatedRentalEndDate): self
    {
        $this->estimatedRentalEndDate = $estimatedRentalEndDate;

        return $this;
    }

    public function getReelRentalEndDate(): ?\DateTimeInterface
    {
        return $this->reelRentalEndDate;
    }

    public function setReelRentalEndDate(?\DateTimeInterface $reelRentalEndDate): self
    {
        $this->reelRentalEndDate = $reelRentalEndDate;

        return $this;
    }

    public function getMAJDate(): ?\DateTimeInterface
    {
        return $this->MAJDate;
    }

    public function setMAJDate(?\DateTimeInterface $MAJDate): self
    {
        $this->MAJDate = $MAJDate;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getMonthlyCost(): ?int
    {
        return $this->monthlyCost;
    }

    public function setMonthlyCost(?int $monthlyCost): self
    {
        $this->monthlyCost = $monthlyCost;

        return $this;
    }

    public function getFuelCard(): ?string
    {
        return $this->fuelCard;
    }

    public function setFuelCard(?string $fuelCard): self
    {
        $this->fuelCard = $fuelCard;

        return $this;
    }

    public function getTollCard(): ?string
    {
        return $this->tollCard;
    }

    public function setTollCard(?string $tollCard): self
    {
        $this->tollCard = $tollCard;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?int $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getCO2Emission(): ?int
    {
        return $this->CO2Emission;
    }

    public function setCO2Emission(?int $CO2Emission): self
    {
        $this->CO2Emission = $CO2Emission;

        return $this;
    }

    public function getGPS(): ?string
    {
        return $this->GPS;
    }

    public function setGPS(?string $GPS): self
    {
        $this->GPS = $GPS;

        return $this;
    }

    public function getRegulator(): ?string
    {
        return $this->regulator;
    }

    public function setRegulator(?string $regulator): self
    {
        $this->regulator = $regulator;

        return $this;
    }

    public function isIsReserved(): ?bool
    {
        return $this->isReserved;
    }

    public function setIsReserved(?bool $isReserved): self
    {
        $this->isReserved = $isReserved;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(?bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

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
            $reservation->addCar($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeCar($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, TypeCar>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(TypeCar $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(TypeCar $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, Site>
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }

    public function addSite(Site $site): self
    {
        if (!$this->sites->contains($site)) {
            $this->sites[] = $site;
        }

        return $this;
    }

    public function removeSite(Site $site): self
    {
        $this->sites->removeElement($site);

        return $this;
    }

    public function getPersonel(): ?Personel
    {
        return $this->personel;
    }

    public function setPersonel(?Personel $personel): self
    {
        $this->personel = $personel;

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        $this->teams->removeElement($team);

        return $this;
    }
}
