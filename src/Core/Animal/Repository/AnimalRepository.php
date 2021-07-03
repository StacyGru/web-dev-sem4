<?php

declare(strict_types=1);

namespace App\Core\Animal\Repository;

use App\Core\Common\Repository\AbstractRepository;
use App\Core\Animal\Document\Animal;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;

/**
 * @method Animal save(Animal $animal)
 * @method Animal|null find(string $id)
 * @method Animal|null findOneBy(array $criteria)
 * @method Animal getOne(string $id)
 */
class AnimalRepository extends AbstractRepository
{
    public function getDocumentClassName(): string
    {
        return Animal::class;
    }

    /**
     * @throws LockException
     * @throws MappingException
     */
    public function getAnimalById(string $id): ?Animal
    {
        return $this->find($id);
    }
}
