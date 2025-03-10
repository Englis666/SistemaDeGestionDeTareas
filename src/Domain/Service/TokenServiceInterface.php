<?php
namespace Acnth\SistemaDeGestionDeTareas\Domain\Service;

interface TokenServiceInterface{
    public function generate(int $idUser): string;
    public function validate(string $token): ?int;
}