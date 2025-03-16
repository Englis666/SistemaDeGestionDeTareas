<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Repository;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\TypeOfTask;

interface TypeOfTaskRepositoryInterface{
    public function getTypeOfTaskByUserId(int $idUser): array;
    public function createTypeOfTask(TypesOfTask $typeOfTask): bool;
}