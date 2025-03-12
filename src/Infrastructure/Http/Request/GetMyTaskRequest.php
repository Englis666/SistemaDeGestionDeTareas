<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;

class GetMyTaskRequest {
    public string $token;

    public function __construct(array $token){
        if (!isset($token)){
            throw new \InvalidArgumentException("El token no fue entregado");
        }
        $this->token = $token;
    }

}