<?php

namespace App\Controller;

use App\Model\AuthorModel;

class AuthorController extends JsonController
{
    public function getAuthors(): void
    {
         
         $authors = (new AuthorModel())->findAll();

        $this->jsonResponse($authors);
    }

    public function getAuthorById(int $id): void
    {
        
        $author = (new AuthorModel())->findOne($id);

        if ($author) {
            $this->jsonResponse($author);
        } else {
            $this->jsonError('Author not found', 404);
        }
    }
}