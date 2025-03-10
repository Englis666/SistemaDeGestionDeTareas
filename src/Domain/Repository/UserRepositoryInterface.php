<?php

namespace Acnth\SistemaDeGestionDeTareas\Domain\Repository;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\User;

interface UserRepositoryInterface {
    public function save(User $user): bool;
    public function findByEmail(string $email): ?User;
}
