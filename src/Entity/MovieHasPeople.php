<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieHasPeopleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MovieHasPeopleRepository::class)]
#[ApiResource]
class MovieHasPeople
{
    #[ORM\ManyToOne(inversedBy: 'movieHasPeople')]
    #[ORM\JoinColumn(nullable: false)]
    private Movie $movie;

    #[ORM\ManyToOne(inversedBy: 'movieHasPeople')]
    #[ORM\JoinColumn(nullable: false)]
    private People $people;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private ?string $role = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Choice(choices: ['principal', 'secondaire'])]
    private ?string $significance = null;

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): static
    {
        $this->movie = $movie;

        return $this;
    }

    public function getPeople(): People
    {
        return $this->people;
    }

    public function setPeople(?People $people): static
    {
        $this->people = $people;

        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getSignificance(): ?string
    {
        return $this->significance;
    }

    public function setSignificance(?string $significance): static
    {
        $this->significance = $significance;

        return $this;
    }
}
