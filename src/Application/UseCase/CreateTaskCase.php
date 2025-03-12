<?php

namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TaskRespositoryInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;


class CreateTaskCase {
    private TaskRepositoryInterface $taskRepository;
    private TokenServiceInterface $tokenService;

    public function __construct(TaskRepositoryInterface $taskRepository, TokenServiceInterface $tokenService){
        $this->taskRepository = $taskRepository;
        $this->tokenService = $tokenService;
    }

    public function execute(string $type, string $title , string $description , date $startDate , date $finishDate , $token) : bool{
        $tokenValidated = $this->tokenService->validate($token);
        $this->TaskRepository->createTask($token);
    }



}
