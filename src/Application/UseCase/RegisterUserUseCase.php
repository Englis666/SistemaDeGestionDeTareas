<?php
namespace Acnth\SistemaDeGestionDeTareas\Application\UseCase;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\User;
use Acnth\SistemaDeGestionDeTareas\Domain\Repository\UserRepositoryInterface;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\PasswordHasherInterface;

class RegisterUserUseCase {
    private UserRepositoryInterface $userRepository;
    private PasswordHasherInterface $passwordHasher;

    public function __construct(UserRepositoryInterface $userRepository, PasswordHasherInterface $passwordHasher) {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function execute(string $email, string $password): bool {
        $hashedPassword = $this->passwordHasher->hash($password); 
        $user = new User(null, $email, $hashedPassword);
        return $this->userRepository->save($user);
    }
}
