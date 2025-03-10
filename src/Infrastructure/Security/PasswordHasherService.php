<?php

namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Security;

use Acnth\SistemaDeGestionDeTareas\Domain\Service\PasswordHasherInterface;

class PasswordHasherService implements PasswordHasherInterface {
    public function hash(string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify(string $password, string $hash): bool {
        return password_verify($password, $hash);
    }
}
