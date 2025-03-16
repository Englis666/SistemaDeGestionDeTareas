<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Persistence;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\Task;
use Acnth\SitemaDeGestionDeTareas\Domain\Repository\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface {
    private PDO $connection;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    public function getTaskByUserId(int $idUser): array{
        $stmt = $this->db->prepare("SELECT * FROM task WHERE idUser = :idUser");
        $stmt->bindParam(":idUser", $idUser , PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $tasks = [];
        foreach ($tasksData as $taskData){
            $tasks[] = new Task(
                $taskData['idtask'],
                $taskData['idUser'],
                $taskData['title'],
                $taskData['description'],
                new \DateTimeInmutable($taskData['startDate']),
                new \DateTimeInmutable($taskData['finishDate'])
            );
        }
        return $tasks;
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
