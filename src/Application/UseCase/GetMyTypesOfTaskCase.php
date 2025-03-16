<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TypeOfTaskRepositoryInterface;

class getMyTypesOfTask {
    private TypeOfTaskRepositoryInterface $typeOfTaskRepository;

    public function __construct(TypeOfTaskRepositoryInterface $typeOfTaskRepository){
        $this->typeTask = $typeOfTaskRepository;
    }
    public function execute(int $idUser): array{
        return $this->typeTask->getTypeOfTaskByUserId($idUser);
    }
}