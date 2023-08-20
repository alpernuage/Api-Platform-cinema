<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: '`movie`')]
#[ORM\Entity]
#[ApiResource]
class Movie
{
    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\Id, ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: Types::STRING, length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private string $title;

    #[ORM\Column(type: Types::INTEGER, length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    private int $duration;

    #[ORM\OneToMany(mappedBy: 'movie', targetEntity: MovieHasPeople::class, orphanRemoval: true)]
    private Collection $movieHasPeople;
}
