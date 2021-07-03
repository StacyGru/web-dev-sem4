<?php

declare(strict_types=1);

namespace App\Api\Animal\Dto;


class AnimalResponseDto
{
    public ?string $id = null;

    public ?string $name  = null;

    public ?string $animal = null;

    public ?int $age;
}
