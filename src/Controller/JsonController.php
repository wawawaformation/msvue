<?php

namespace App\Controller;

abstract class JsonController
{
    /**
     * Envoie une réponse JSON.
     *
     * @param mixed $data Données à renvoyer
     * @param int $statusCode Code de statut HTTP (par défaut 200)
     */
    protected function jsonResponse($data, int $statusCode = 200): void
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET'); 
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        http_response_code($statusCode);
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Gère les erreurs en renvoyant un message JSON.
     *
     * @param string $message Message d'erreur
     * @param int $statusCode Code de statut HTTP (par défaut 400)
     */
    protected function jsonError(string $message, int $statusCode = 400): void
    {
        $this->jsonResponse(['error' => $message], $statusCode);
    }
}
