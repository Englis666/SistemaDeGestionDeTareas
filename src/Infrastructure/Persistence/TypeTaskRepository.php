<?php
namespace Acnth\SistemaDeGestion\Infrastructure\Persistence;

use Acnth\SistemaDeGestionDeTareas\Entity\TypesOfTask;
use Acnth\SistemaDeGestionDeTareas\Domain\Repository\TypesOfTaskRepositoryInterface;

class TypesOfTaskRepository implements TypesOfTaskInterface{
    private PDO $connection;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    public function getTypesOfTaskByUserId(int $idUser): array{
        $stmt = $this->db->prepare("SELECT * FROM typeTask WHERE user_idUser = :idUser");
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);

        $typeTask = [];
        foreach ($typeTaskData as $typeTaskData){
            $task[] = new TypeTasks(
                $typeTask['idTypeTask'],
                $typeTask['title'],
                $typeTask['description'],
            );
        }
        return $typeTask;
    }
}