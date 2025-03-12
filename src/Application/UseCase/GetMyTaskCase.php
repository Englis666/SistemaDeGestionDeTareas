<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TaskRepositoryInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;

class GetMyTaskCase {
    private TaskRepositoryInterface $taskRepository;
    private TokenServiceInterface $tokenService;

    public function __construct(TaskRepositoryInterface $taskRepository, TokenServiceInterface $tokenService){
        $this->taskRepository = $taskRepository;
        $this->tokenService = $tokenService;
    }

    public function execute(string $token): ?string{
        if (!$token || $this->tokenService->validate($token)){
            return null;
        }
        $user = $token['idUser'];
        return $this->taskRepository->getMyTask($user);
    }



}