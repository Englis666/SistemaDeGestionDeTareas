<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TypesOfTaskRepositoryInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;

class CreateTypeOfTaskCase{
    private TypeOfTaskRepositoryInterface $typeOfTaskRepository;
    private TokenServiceInterface $tokenService;

    public function __construct(TypeOfTaskRepositoryInterface $typeOfTaskRepository , TokenServiceInterface $tokenService){
        $this->typeOfTaskRepository = $typeOfTaskRepository;
        $this->tokenService = $tokenService;
    }

    public function execute(string $title , string $description , int $idUser){
        $tokenValidated = $this->tokenService->validate($token);
        $this->TypeOfTaskRepository->createTypeOfTask($token);
    }


}