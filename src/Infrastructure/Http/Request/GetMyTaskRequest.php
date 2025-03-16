<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;

class GetMyTaskRequest {
    public ?int $idUser;

    public function __construct(int $idUser){
        if (!isset($idUser)){
            throw new \InvalidArgumentException("The id of the User is dont send");
        }
        $this->idUser = $idUser;
    }

}