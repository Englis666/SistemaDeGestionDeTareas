<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Repository\UserRepositoryInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\PasswordHasherInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;

class LoginUserUseCase {
    private UserRepositoryInterface $userRepository;
    private PasswordHasherInterface $passwordHasher;
    private TokenServiceInterface $tokenService;

    public function __construct(UserRepositoryInterface $userRepository, PasswordHasherInterface $passwordHasher, TokenServiceInterface $tokenService) {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
        $this->tokenService = $tokenService;
    }

    public function execute(string $email, string $password): ?string {
        $user = $this->userRepository->findByEmail($email);
        if (!$user || !$this->passwordHasher->verify($password, $user->getPassword())) {
            return null;
        }
        return $this->tokenService->generate($user->getIdUser());
    return $token;
    }
}
