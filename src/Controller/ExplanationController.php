<?php

namespace App\Controller;


class ExplanationController extends JsonController
{
    /**
     * Fournit une explication sur le fonctionnement de l'API.
     */
    public function explain(): void
    {
        $explanation = [
            'name' => 'API Citations',
            'version' => '1.0',
            'description' => 'Cette API permet de gérer des auteurs et des citations.',
            'endpoints' => [
                'GET /authors' => 'Retourne la liste de tous les auteurs.',
                'GET /authors/{id}' => 'Retourne les informations sur un auteur spécifique.',
                'GET /quotes' => 'Retourne la liste de toutes les citations.',
                'GET /quotes/{id}' => 'Retourne les informations sur une citation spécifique.',
                'GET /explain' => 'Retourne cette explication sur le fonctionnement de l\'API.'
            ],
            'usage' => 'Utilisez les routes ci-dessus avec une méthode HTTP GET pour accéder aux données.',
            'example' => [
                'request' => '/quotes/1',
                'response' => [
                    'id' => 1,
                    'author_id' => 2,
                    'author' => 'Victor Hugo',
                    'quote' => 'La liberté commence où l’ignorance finit.',
                    'explanation' => 'Célèbre citation de Victor Hugo.',
                    'created_at' => '2024-12-31 11:02:48',
                    'updated_at' => '2024-12-31 11:02:48'
                ]
            ]
            
        ];
        $this->jsonResponse($explanation);

    }
}
