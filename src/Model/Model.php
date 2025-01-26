<?php

namespace App\Model;

use App\Database\Database;
use PDO;
use PDOStatement;

abstract class Model
{
    protected PDO $db;

    /**
     * Constructeur pour initialiser la connexion à la base de données.
     */
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Préparer et exécuter une requête SQL, avec ou sans paramètres.
     *
     * @param string $sql La requête SQL à exécuter.
     * @param array|null $params Les paramètres à lier à la requête (ou null pour une requête simple).
     * @return PDOStatement La requête exécutée.
     */
    protected function statement(string $sql, ?array $params = null): PDOStatement
    {
        if ($params === null) {
            // Exécute une requête simple si aucun paramètre n'est fourni
            $stmt = $this->db->query($sql);
        } else {
            // Prépare et exécute une requête avec des paramètres
            $stmt = $this->db->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue(is_int(value: $key) ? $key + 1 : ":$key", $value);
            }
            $stmt->execute();
        }

        return $stmt;
    }
}
