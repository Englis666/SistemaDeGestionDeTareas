<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http;

use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Controller\UserController;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Persistence\UserRepository;
use Acnth\SistemaDeGestionDeTareas\Application\UseCase\RegisterUserUseCase;
use Acnth\SistemaDeGestionDeTareas\Application\UseCase\LoginUserUseCase;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Database\Database;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Response\JsonResponse;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Security\PasswordHasherService;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Security\TokenService; 

class Router {
    public static function handleRequest() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        $pdo = Database::getConnection(); 
        $userRepository = new UserRepository($pdo);
        $passwordHasher = new PasswordHasherService();
        $registerUserUseCase = new RegisterUserUseCase($userRepository , $passwordHasher);

        $config = require __DIR__ . '/../../../config/jwt.php';
        $secretKey = $config['secret'];
        $passwordHasher = new PasswordHasherService();
        $tokenService = new TokenService($secretKey);

        $loginUserUseCase = new LoginUserUseCase($userRepository, $passwordHasher, $tokenService);
        
        $userController = new UserController($registerUserUseCase, $loginUserUseCase);

        $requestUri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && $requestUri === '/SistemaDeGestionDeTareas/public/register') {
            $userController->register();
            return;
        }
        if ($method === 'POST' && $requestUri === '/SistemaDeGestionDeTareas/public/login') { 
            $userController->login();
            return;
        }
        if ($method === 'POST' && $requestUri === '/SistemaDeGestionDeTareas/public/CreateTask'){
            $taskController->createTask();
            return;
        }


        if($method === "GET" && $requestUri === '/SistemaDeGestionDeTareas/public/getMyTasks'){
            $taskController->getMyTask();
            return;
        }

        if($method === "GET" && $requestUri === '/SistemaDeGestionDeTareas/public/GetMyTypesOfTask'){
            $taskController->getMyTypesOfTask();
            return;
        }

        JsonResponse::send(["error" => "Ruta no encontrada: $requestUri"], 404);
    }
}
