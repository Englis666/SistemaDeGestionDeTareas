<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Entity;

class Task{
    private ?int $idTask;
    private int $idTypesOfClass;
    private string $title;
    private string $description;
    private \DateTimeInmutable $startDate;
    private \DateTimeInmutable $finishDate;

    public function __construct(?int $idTask, string $title, string $description, \DateTimeInmutable $startDate, \DateTimeInmutable $finishDate){
        $this->idTask = $idTask;
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->finishDate = $finishDate;
    }

    public function getMyTask(): ?int {
        return $this->idTask;
    }
    public function getTitle(): string{
        return $this->title;
    }
    public function getDescription(): string{
        return $this->description;
    }
    public function getStartDate(): \DateTimeInmutable {
        return $this->$startDate;
    }
    public function getFinishDate(): \DateTimeInmutable {
        return $this->$finishDate;
    }


}