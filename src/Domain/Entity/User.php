<?php

namespace Acnth\SistemaDeGestionDeTareas\Domain\Entity;

class User {
    private ?int $idUser;
    private string $email;
    private string $password;

    public function __construct(?int $idUser, string $email, string $password) {
        $this->idUser = $idUser;
        $this->email = $email;
        $this->password = $password;
    }

    public function getIdUser(): ?int {
        return $this->idUser;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }
}