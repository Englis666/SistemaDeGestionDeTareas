<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Service;

interface TokenServiceInterface{
    public function generate(int $idUser): string;
    public function validate(string $token): ?int;
    public function getTokenFromHeaders(): string;
    public function decodeToken(string $token): ?object;
}