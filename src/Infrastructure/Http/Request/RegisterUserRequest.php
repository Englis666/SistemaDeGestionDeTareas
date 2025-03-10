<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;

class RegisterUserRequest {
    public string $email;
    public string $password;

    public function __construct(array $data) {
        if (!isset($data['email'], $data['password'])) {
            throw new \InvalidArgumentException("Faltan campos requeridos");
        }

        $this->email = $data['email'];
        $this->password = $data['password'];
    }
}
