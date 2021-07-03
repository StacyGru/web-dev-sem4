<?php

declare(strict_types=1);

namespace App\Api\Animal\Dto;

class AnimalListResponseDto
{
    public array $data;

    public function __construct(AnimalResponseDto ...$data)
    {
        $this->data = $data;
    }
}
