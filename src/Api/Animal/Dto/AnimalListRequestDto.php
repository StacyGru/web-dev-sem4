<?php

declare(strict_types=1);

namespace App\Api\Animal\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class AnimalListRequestDto
{
    /**
     * @Assert\Author("integer")
     */
    public $page = "1";

    /**
     * @Assert\LessThan(50)
     */
    public $slice = "10";
}
