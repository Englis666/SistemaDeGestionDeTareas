<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Controller;

use Acnth\SistemaDeGestionDeTareas\Application\UseCase\GetMyTaskUseCase;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request\GetMyTaskRequest;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Response\JsonResponse;

class TaskController {
    private GetMyTaskUseCase $getMyTaskUseCase;
    private TokenServiceInterface $tokenService;
    
    public function __construct(GetMyTaskUseCase $getMyTaskUseCase, TokenServiceInterface $tokenService){
        $this->getMyTaskUseCase = $getMyTaskUseCase;
        $this->tokenService = $tokenService;

    }

    public function getMyTask(){
        try{
            $token = $this->tokenService->getTokenFromHeaders();
            if(!$token){
                throw new \Exception("Token no proporcionado", 401);
            }
            $decoded = $this->tokenService->decodeToken($token);
            if(!$decoded || !isset($decoded->idUser)){
                throw new \Exception("Token invalido", 403);
            }
            $idUser = $decoded->idUser;
            $request = new GetMyTaskRequest(json_decode(file_get_contents("php://input"), true));
            $success = $this->getMyTaskUseCase->execute($request->idUser);

            if($success){
                JsonResponse::send(["Tareas" => $tareas]);
            } else {
                JsonResponse::send(["Error" => "Error getting the tasks"]);
            }
        } catch (\Exception $e){
            JsonResponse::send(["Error" => $e->getMessage()], 400);
        }
    }

    public function CreateTask(){
        try {
            $token = $this->tokenService->getTokenFromHeaders();
            if(!$token){
                throw new \Exception("Token no proporcionado", 401);
            }
            $request = new CreateTaskRequest(json_decode(file_get_contents("php://input"), true));
            $succes = $this->CreateTaskCase->execute($request->$type , $request->title, $request->description , $request->startDate , $request->finishDate);

            if($succes !== null){
                JsonResponse::send(["message" => 'Tarea creada']);
            } else {
                JsonResponse::send(["Error" => "Error en la creacion de la tarea"] , 400);
            }
            
        } catch (\Exception $e){
            JsonResponse::send(["Error " => $e->getMessage()], 400);
        }

    }

}