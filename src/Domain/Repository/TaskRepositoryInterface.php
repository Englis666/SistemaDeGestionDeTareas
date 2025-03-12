<?php

namespace Acnth\SistemaDeGestionDeTareas\Domain\Repository;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\Task;

interface TaskRepositoryInterface{
    public function getMyTask(Task $task): bool;
    
    public function createTask(Task $task) : bool;

}