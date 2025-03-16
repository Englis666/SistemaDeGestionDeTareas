<?php

namespace Acnth\SistemaDeGestionDeTareas\Domain\Repository;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\Task;

interface TaskRepositoryInterface{
    public function getTaskByUserId(int $idUser): array;
    public function createTask(Task $task) : bool;

}