<?php

namespace Acnth\SistemaDeGestionDeTareas\Domain\Service;

interface PasswordHasherInterface {
    public function hash(string $password): string;
    
    public function verify(string $password, string $hash): bool;
}    
