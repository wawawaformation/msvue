<?php

namespace App\Controller;

use App\Model\QuoteModel;

class QuoteController extends JsonController
{
   
    /**
     * Récupérer toutes les citations.
     */
    public function getQuotes(): void
    {
        $quotes = (new QuoteModel())->findAll();
        $this->jsonResponse($quotes);
    }

    /**
     * Récupérer une citation par son ID.
     *
     * @param int $id
     */
    public function getQuoteById(int $id): void
    {
        $quote = (new QuoteModel())->findOne($id);

        if ($quote) {
            $this->jsonResponse($quote);
        } else {
            $this->jsonError('Quote not found', 404);
        }
    }
}