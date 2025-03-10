<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;

class LoginUserRequest {
    public string $email;
    public string $password;

   public function __construct(array $data){
        if (!isset($data['email']) || !isset($data['password'])){
            throw new \InvalidArgumentException("Faltan campos requeridos");
        }
        $this->email = trim($data['email']);
        $this->password = trim($data['password']);
    }



}