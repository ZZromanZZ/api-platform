<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Dto\GreetingDto;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(mercure: true, output: GreetingDto::class, provider: \App\Service\GreetingDtoProvider::class)]
#[ORM\Entity]
class Greeting
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    public string $name = '';

    public function getId(): ?int
    {
        return $this->id;
    }
}
