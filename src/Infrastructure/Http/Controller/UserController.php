<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Controller;

use Acnth\SistemaDeGestionDeTareas\Application\UseCase\RegisterUserUseCase;
use Acnth\SistemaDeGestionDeTareas\Application\Usecase\LoginUserUseCase;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request\RegisterUserRequest;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request\LoginUserRequest;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Response\JsonResponse;

class UserController {
    private RegisterUserUseCase $registerUserUseCase;
    private LoginUserUseCase $loginUserUseCase;

    public function __construct(RegisterUserUseCase $registerUserUseCase , LoginUserUseCase $loginUserUseCase) {
        $this->registerUserUseCase = $registerUserUseCase;
        $this->loginUserUseCase = $loginUserUseCase;
    }

    public function register() {
        try {
            $request = new RegisterUserRequest(json_decode(file_get_contents("php://input"), true));
            $success = $this->registerUserUseCase->execute($request->email, $request->password);

            if ($success) {
                JsonResponse::send(["message" => "Usuario registrado exitosamente"]);
            } else {
                JsonResponse::send(["error" => "Error al registrar usuario"], 500);
            }
        } catch (\Exception $e) {
            JsonResponse::send(["error" => $e->getMessage()], 400);
        }
    }
    public function login() {
    try {
        $request = new LoginUserRequest(json_decode(file_get_contents("php://input"), true));
        $token = $this->loginUserUseCase->execute($request->email, $request->password);

        if ($token !== null) {
            JsonResponse::send(["message" => "Bienvenido"]);
        } else {
            JsonResponse::send(["error" => "Error en la validación"], 401);
        } 
        
    } catch (\Exception $e) {
        JsonResponse::send(["error" => $e->getMessage()], 400);
    }
}


}
