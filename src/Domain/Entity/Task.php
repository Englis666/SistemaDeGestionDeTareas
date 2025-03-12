<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Entity;

class Task{
    private ?int $idTask;
    private string $title;
    private string $description;
    private date $startDate;
    private date $finishDate;

    public function __construct(?int $idTask, string $title, string $description, date $startDate, date $finishDate){
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
    public function getStartDate(): date{
        return $startDate;
    }
    public function getFinishDate(): date {
        return $finishDate;
    }


}