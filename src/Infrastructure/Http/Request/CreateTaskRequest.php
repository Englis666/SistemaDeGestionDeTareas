<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request;
 
class CreateTaskRequest {
    public string $typeTask;
    public string $title;
    public string $description;
    public date $startDate;
    public date $finishDate;

    public function __construct(array $data){
        if (!isset($data['typeTask'], $data['title'], $data['description'], $data['startDate'], $data['finishDate'])){
            throw new \InvalidArgumentException("Faltan datos requeridos");
        }

        $this->typeTask = $data['typeTask'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->startDate = $data['startDate'];
        $this->finishDate = $data['finishDate'];

    }
}
