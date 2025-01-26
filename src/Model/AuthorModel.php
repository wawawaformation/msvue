<?php

namespace App\Model;

class AuthorModel extends Model
{
    /**
     * Récupérer tous les auteurs.
     *
     * @return array La liste des auteurs.
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM author";
        $stmt = $this->statement($sql);

        return $stmt->fetchAll();
    }

    /**
     * Récupérer un auteur par son ID.
     *
     * @param int $id L'identifiant de l'auteur.
     * @return array|null Les informations de l'auteur ou null si non trouvé.
     */
    public function findOne(int $id): ?array
    {
        $sql = "SELECT * FROM author WHERE id = :id";
        $stmt = $this->statement($sql, ['id' => $id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }
}
