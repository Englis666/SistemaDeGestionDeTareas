<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Entity;

class TypesOfTask{
    private ?int $idTypesOfClass;
    private int $idUser;
    private string $title;
    private string $description;

    public function __construct(?int $idTypesOfClass , string $title , string $description){
        $this->idTypesOfClass = $idTypesOfClass;
        $this->title = $title;
        $this->description = $description;
    }

    public function getMyTypeOfClass(): ?int {
        return $this->idTypeOfClass;
    }
    public function getTitle(): string{
        return $this->title;
    }
    public function getDescription(): string{
        return $this->description;
    }
}