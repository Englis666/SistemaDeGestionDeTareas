<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Persistence;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\Task;
use Acnth\SitemaDeGestionDeTareas\Domain\Repository\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface {
    private PDO $connection;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    public function CreateTask(string $task): ?Task{
        $stmt = $this->connection->preparee("INSERT INTO tasks (title, startDate, finishDate, description) VALUES (:title , :startDate, :finishDate , :description");
        return $stmt->execute([
            ':title' => $task->getTitle(),
            ':startDate' =>$task->getStartDate(),
            ':finishDate' =>$task->getFinishDate(),
            ':description' =>$task->getDescription(),
        ]);
    }

}
