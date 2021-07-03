<?php

declare(strict_types=1);

namespace App\Api\Animal\Controller;

use App\Api\Animal\Dto\AnimalCreateRequestDto;
use App\Api\Animal\Dto\AnimalListResponseDto;
use App\Api\Animal\Dto\AnimalResponseDto;
use App\Api\Animal\Dto\AnimalUpdateRequestDto;
use App\Core\Common\Dto\ValidationFailedResponse;
use App\Core\Animal\Document\Animal;

use App\Core\User\Enum\Permission;

use App\Core\Animal\Repository\AnimalRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * @Route("/animals")
 */
class AnimalController extends AbstractController
{
    /**
     * @Route(path="/{id<%app.mongo_id_regexp%>}", methods={"GET"})
     *
     * @IsGranted(Permission::ANIMAL_SHOW)
     *
     * @ParamConverter("animal")
     *
     * @Rest\View()
     *
     * @param Animal|null $animal
     *
     * @return AnimalResponseDto
     */
    public function show(Animal $animal = null)
    {
        if (!$animal) {
            throw $this->createNotFoundException('Animal not found');
        }

        return $this->createAnimalResponse($animal);
    }

    /**
     * @Route(path="", methods={"GET"})
     *
     * @IsGranted(Permission::ANIMAL_INDEX)
     *
     * @Rest\View()
     *
     * @return AnimalListResponseDto|ValidationFailedResponse
     */
    public function index(
        Request $request,
        AnimalRepository $animalRepository
    ): AnimalListResponseDto {
        $page = (int)$request->get('page');
        $quantity = (int)$request->get('slice');

        $animals = $animalRepository->findBy([], [], $quantity, $quantity * ($page - 1));

        return new AnimalListResponseDto(
            ...array_map(
                function (Animal $animal) {
                    return $this->createAnimalResponse($animal);
                },
                $animals
            )
        );
    }

    /**
     * @Route(path="", methods={"POST"})
     * @IsGranted(Permission::ANIMAL_CREATE)
     * @ParamConverter("requestDto", converter="fos_rest.request_body")
     *
     * @Rest\View(statusCode=201)
     *
     * @param AnimalCreateRequestDto $requestDto
     * @param ConstraintViolationListInterface $validationErrors
     * @param AnimalRepository $animalRepository
     *
     * @return AnimalResponseDto|ValidationFailedResponse|Response
     */
    public function create(
        AnimalCreateRequestDto $requestDto,
        ConstraintViolationListInterface $validationErrors,
        AnimalRepository $animalRepository
    ) {
        if ($validationErrors->count() > 0) {
            return new ValidationFailedResponse($validationErrors);
        }

        $animal = new Animal(
            $requestDto->name,
            $requestDto->animal,
            $requestDto->age
        );

        $animalRepository->save($animal);

        return $this->createAnimalResponse($animal);
    }

    /**
     * @Route(path="/{id<%app.mongo_id_regexp%>}", methods={"PUT"})
     * @IsGranted(Permission::ANIMAL_UPDATE)
     * @ParamConverter("animal")
     * @ParamConverter("requestDto", converter="fos_rest.request_body")
     *
     * @Rest\View()
     *
     * @param AnimalUpdateRequestDto $requestDto
     * @param ConstraintViolationListInterface $validationErrors
     * @param AnimalRepository $animalRepository
     *
     * @return AnimalResponseDto|ValidationFailedResponse|Response
     */
    public function update(
        Animal $animal = null,
        AnimalUpdateRequestDto $requestDto,
        ConstraintViolationListInterface $validationErrors,
        AnimalRepository $animalRepository
    ) {
        if (!$animal) {
            throw $this->createNotFoundException('Animal not found');
        }

        if ($validationErrors->count() > 0) {
            return new ValidationFailedResponse($validationErrors);
        }

        $animal->setName($requestDto->name);
        $animal->setAnimal($requestDto->animal);
        $animal->setAge($requestDto->age);

        $animalRepository->save($animal);

        return $this->createAnimalResponse($animal);
    }

    /**
     * @Route(path="/{id<%app.mongo_id_regexp%>}", methods={"DELETE"})
     * @IsGranted(Permission::ANIMAL_DELETE)
     * @ParamConverter("animal")
     *
     * @Rest\View()
     *
     * @param Animal|null $animal
     * @param AnimalRepository $animalRepository
     *
     * @return AnimalResponseDto|ValidationFailedResponse
     */
    public function delete(
        AnimalRepository $animalRepository,
        Animal $animal = null
    ) {
        if (!$animal) {
            throw $this->createNotFoundException('Animal not found');
        }

        $animalRepository->remove($animal);
    }

    /**
     * @param Animal $animal
     *
     * @return AnimalResponseDto
     */
    private function createAnimalResponse(Animal $animal): AnimalResponseDto
    {
        $dto = new AnimalResponseDto();

        $dto->id = $animal->getId();
        $dto->name = $animal->getName();
        $dto->animal = $animal->getAnimal();
        $dto->age = $animal->getAge();

        return $dto;
    }
}
