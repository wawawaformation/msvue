<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static ?Database $instance = null;
    private PDO $connection;

    /**
     * Constructeur privé pour empêcher l'instanciation directe.
     */
    private function __construct()
    {
        $dsn = 'sqlite:' . __DIR__ . '/../../quotes.sqlite';

        try {
            $this->connection = new PDO($dsn);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    /**
     * Récupère l'instance unique de la classe.
     *
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Récupère la connexion PDO.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * Empêche la copie de l'instance.
     */
    private function __clone()
    {
    }

    /**
     * Empêche la désérialisation de l'instance.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot deserialize a singleton.");
    }
    
}
