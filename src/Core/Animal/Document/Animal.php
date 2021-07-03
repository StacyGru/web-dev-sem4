<?php

declare(strict_types=1);

namespace App\Core\Animal\Document;

use App\Core\Common\Document\AbstractDocument;
use App\Core\Animal\Repository\AnimalRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @MongoDB\Document(repositoryClass=AnimalRepository::class, collection="animals")
 */
class Animal extends AbstractDocument
{
    /**
     * @MongoDB\Id
     */
    protected ?string $id = null;

    /**
     * @MongoDB\Field(type="string")
     */
    protected string $name  = '';

    /**
     * @MongoDB\Field(type="string")
     */
    protected string $animal  = '';

    /**
     * @MongoDB\Field(type="int")
     */
    protected int $age;


    public function __construct(
        string $name,
        string $animal,
        int $age
    ) {
        $this->name  = $name;
        $this->animal  = $animal;
        $this->age  = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getAnimal(): ?string
    {
        return $this->animal;
    }

    public function setAnimal(?string $animal): void
    {
        $this->animal = $animal;
    }
}
