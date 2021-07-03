<?php

declare(strict_types=1);

namespace App\Api\Animal\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class AnimalUpdateRequestDto
{
     /**
     * @Assert\Length(max=50, min=2)
     */
    public ?string $name = null;

     /**
     * @Assert\Length(max=80, min=2)
     */
    public ?string $animal;

    public ?int $age;
}
