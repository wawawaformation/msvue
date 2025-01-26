<?php

namespace App\Controller;

class ErrorController extends JsonController
{
    /**
     * Gère les erreurs 404 (Page non trouvée).
     */
    public function notFound(): void
    {
        $this->jsonError('The requested resource was not found.', 404);
    }

    /**
     * Gère les erreurs 500 (Erreur serveur).
     *
     * @param string|null $message Message personnalisé (facultatif).
     */
    public function serverError(?string $message = null): void
    {
        $this->jsonError($message ?? 'An unexpected server error occurred.', 500);
    }
}