<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;

class CreateTypeOfTaskRequest{
    public string $title;
    public string $description;
    public int $idUser;

    public function __construct(array $data){
        if (!isset($data['title'], $data['description'], $data['idUser'])){
            throw new \InvalidArgumentException("Faltan datos requeridos");
        }

        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->idUser = $data['idUser'];

    }


}

