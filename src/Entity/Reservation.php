<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
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
    private $demand;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDemandValid;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $operationCode;

    /**
     * @ORM\Column(type="date")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="time")
     */
    private $departureTime;

    /**
     * @ORM\Column(type="date")
     */
    private $returnDate;

    /**
     * @ORM\Column(type="time")
     */
    private $returnTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $applicantMail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chiefMail;

    /**
     * @ORM\ManyToMany(targetEntity=Car::class, inversedBy="reservations")
     */
    private $cars;

    /**
     * @ORM\ManyToMany(targetEntity=Site::class, inversedBy="reservations")
     */
    private $sites;

    /**
     * @ORM\ManyToOne(targetEntity=Personel::class, inversedBy="reservations")
     */
    private $personel;

    /**
     * @ORM\ManyToMany(targetEntity=Team::class, inversedBy="reservations")
     */
    private $teams;

    /**
     * @ORM\ManyToMany(targetEntity=TypeCar::class, inversedBy="reservations")
     */
    private $types;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
        $this->sites = new ArrayCollection();
        $this->teams = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemand(): ?string
    {
        return $this->demand;
    }

    public function setDemand(string $demand): self
    {
        $this->demand = $demand;

        return $this;
    }

    public function isIsDemandValid(): ?bool
    {
        return $this->isDemandValid;
    }

    public function setIsDemandValid(bool $isDemandValid): self
    {
        $this->isDemandValid = $isDemandValid;

        return $this;
    }

    public function getOperationCode(): ?string
    {
        return $this->operationCode;
    }

    public function setOperationCode(?string $operationCode): self
    {
        $this->operationCode = $operationCode;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getReturnTime(): ?\DateTimeInterface
    {
        return $this->returnTime;
    }

    public function setReturnTime(\DateTimeInterface $returnTime): self
    {
        $this->returnTime = $returnTime;

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

    public function getApplicantMail(): ?string
    {
        return $this->applicantMail;
    }

    public function setApplicantMail(string $applicantMail): self
    {
        $this->applicantMail = $applicantMail;

        return $this;
    }

    public function getChiefMail(): ?string
    {
        return $this->chiefMail;
    }

    public function setChiefMail(?string $chiefMail): self
    {
        $this->chiefMail = $chiefMail;

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
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        $this->cars->removeElement($car);

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
}
