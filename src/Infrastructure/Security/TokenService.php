<?php

namespace Acnth\SistemaDeGestionDeTareas\Infrastructure\Security;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Acnth\SistemaDeGestionDeTareas\Domain\Service\TokenServiceInterface;

class TokenService implements TokenServiceInterface{

    private string $secretKey;

    public function __construct(string $secretKey){
        $this->secretKey = $secretKey;
    }

    public function generate(int $idUser): string{
        $payload = [
            'iss' => 'SistemaDeGestionDeTareas',
            'sub' => $idUser, 
            'iat' => time(),
            'exp' => time() + 3600 //Esto es una hora
        ];

        return JWT::encode($payload, $this->secretKey, 'HS256');
    }

    public function validate(string $token): ?int{
        try{
            $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
            return $decoded->sub ?? null;
        } catch (\Exception $e){
            return null; // Esto significa que el token es invalido
        }
    }

    public function getTokenFromHeaders(): string{
        $headers = getallheaders();
        if(!isset($headers['Authorization'])){
            return '';
        }
        return str_replace('Bearer ' , '', $headers['Authorization']);
    }

    public function decodeToken(string $token): ?object {
        try{
            return JWT::decode($token , new Key($this->secretKey, 'HS256'));
        } catch (\Exception $e){
            return null;
        }
    }

}
