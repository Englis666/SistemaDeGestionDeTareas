<?php
namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Http\Response;

class JsonResponse {
    public static function send(array $data, int $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
