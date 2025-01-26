<?php

namespace App\Model;

class QuoteModel extends Model
{
    /**
     * Récupérer toutes les citations.
     *
     * @return array La liste des citations.
     */
    public function findAll(): array
    {
        $sql = "SELECT quote.id, quote.quote, author.author, quote.author_id FROM quote
        LEFT JOIN author ON author.id = quote.author_id";
        $stmt = $this->statement($sql);

        return $stmt->fetchAll();
    }

    /**
     * Récupérer une citation par son ID.
     *
     * @param int $id L'identifiant de la citation.
     * @return array|null Les informations de la citation ou null si non trouvée.
     */
    public function findOne(int $id): ?array
    {
        $sql = "SELECT quote.id, quote.quote, quote.explanation, author.author, quote.author_id FROM quote
        LEFT JOIN author ON author.id = quote.author_id
        WHERE quote.id = :id";
        $stmt = $this->statement($sql, ['id' => $id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }

}