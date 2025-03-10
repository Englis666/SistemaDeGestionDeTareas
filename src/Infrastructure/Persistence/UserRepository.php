<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Persistence;

use Acnth\SistemaDeGestionDeTareas\Domain\Entity\User;
use Acnth\SistemaDeGestionDeTareas\Domain\Repository\UserRepositoryInterface;
use PDO;

class UserRepository implements UserRepositoryInterface {
    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function save(User $user): bool {
        $stmt = $this->connection->prepare("INSERT INTO Users (email, password) VALUES (:email, :password)");
        return $stmt->execute([
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ]);
    }

    public function findByEmail(string $email): ?User {
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? new User($data['idUser'], $data['email'], $data['password']) : null;
    }
}
