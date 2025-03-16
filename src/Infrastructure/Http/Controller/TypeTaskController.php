<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Controller;

use Acnth\SistemaDeGestionDeTareas\Application\UseCase\GetMyTypesOfTaskCase;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Request\GetTypeOfTaskRequest;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;
use Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Response\JsonResponse;

class TypeOfTaskController{
    private GetMyTypesOfTaskCase $getMyTypeOfTaskCase;
    private TokenServiceInterface $tokenService;

    public function __construct(GetMyTypesOfTaskCase $getMyTypeOfTaskCase, TokenServiceInterface $tokenService){
        $this->getMyTypesOfTaskCase = $getMyTypeOfTaskCase;
        $thisd->tokenService = $tokenService;
    }

    public function getMyTypesOfTask(){
        try{
                $token = $this->tokenService->GetTokenFromHeaders();
                if (!$token){
                    throw new \Exception("Token no proporcionado", 401);
                }
                $decoded = $this->tokenService->decodeToken($token);
                if(!$decoded || !isset($decoded->idUser)){
                    throw new \Exception("Token invalido", 403);
                }
                $idUser = $decoded->idUser;
                $request = new GetTypeOfTaskRequest(json_decode(file_get_contents("php;//input"), true));
                $success = $this->getMyTypesOfTaskCase->execute($request->idUser);
                if ($success){
                    JsonResponse::send(["TiposDeTarea" => $typeTask]);
                } else {
                    JsonResponse::send(["Error" => "Error getting the types of the tasks"]);
                }
        } catch (\Exception $e){
            JsonResponse::send(["Error" => $e->getMessage()], 400);
        }
    }
    public function createTypeOfTask(){
        try{
            $token = $this->tokenService->getTokenFromHeaders();
            if(!$token){
                throw new \Exception("Token no proporcionaado" , 401);
            }
            $request = new CreateTypeOfTaskRequest(json_decode(file_get_contents("php://input"), true));
            $success = $this->CreateTypeOfTaskCase->execute($request->title , $request->description , $request->idUser);

            if($success !== null){
                JsonResponse::send(["message" => 'Tipo de tarea creada']);
            } else {
                JsonResponse::send(["Error" => "Error al crear el tipo de tarea"],  400);
            }
        } catch (\Exception $e){
            JsonResponse::send(["Error" => $e->getMessage()], 400);
        }
    }

}  