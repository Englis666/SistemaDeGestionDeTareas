<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TaskRepositoryInterface;

class GetMyTaskCase {
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository){
        $this->taskRepository = $taskRepository;
    }

    public function execute(int $idUser): array{
      return $this->taskRepository->getTaskByUserId($idUser);
    }



}